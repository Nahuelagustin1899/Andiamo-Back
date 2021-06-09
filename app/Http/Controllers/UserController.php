<?php   
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        
        if(! $token = auth()->attempt($credentials)) {
            return response()->json([
                'success' => false
            ], 401);
        }


        return $this->respondWithToken($token);
    }

    public function logout(Request $request)
    {   
        auth()->logout();

        return response()->json([
            'success' => true
        ])->withCookie('token', null, time() - 3600, '/', null, false, true);
    }

  

    public function respondWithToken($token)
    {
        $user = auth()->user();
        return response()->json([
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'success' => true,
            'user' => [
                'id' => $user->id,
                'rol' => $user->rol,
                'email' => $user->email,
                'name' => $user->name,
                'logo' => $user->logo,

            ]
        
        ])->withCookie('token', $token, auth()->factory()->getTTL() * 60, '/', null, false, true);
    }
}