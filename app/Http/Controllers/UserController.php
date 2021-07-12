<?php   
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Helpers\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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

    public function edit(Request $request,$id)  
    {
        
        $usuario = User::findOrFail($id);  
        $data = $request->all();

        if($request->logo) {
            $nombreLogo = date('YmdHis') . "." . $request->logo->extension();
            $request->file('logo')->move(public_path('imgs/perfiles/logos/'), $nombreLogo);
            $data['logo'] = $nombreLogo;
            $imagenActual = $usuario->logo;
        }   
 
        $usuario->update($data); 

             if(isset($imagenActual) && !empty($imagenActual)) {
            unlink(public_path('imgs/perfiles/logos/' . $imagenActual));
            }   

         return response()->json(['data' => $usuario]); 
    }

    public function registrarse(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);


        $data = $request->all();
        $data ['rol'] = 3;
        $data['password'] = Hash::make($data['password']);
        
        if(!empty($data['logo'])) {
            $logo = Image::make($data['logo']);
            $nombreLogo = Str::slug($data['name']) . File::mimeToExtension($logo->mime());
            $logo->fit(100, 100, function($constraint) {
                $constraint->upsize();
            })->save(public_path('imgs/perfiles/logos/' . $nombreLogo));

            $data['logo'] = $nombreLogo;
        }

        $usuario = User::create($data);
        
        return response()->json(['success' => true, 'data' => $usuario]);
        
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
                /* 'token' => $token, */

            ]
        
        ])->withCookie('token', $token, auth()->factory()->getTTL() * 60, '/', null, false, true);
    }
}