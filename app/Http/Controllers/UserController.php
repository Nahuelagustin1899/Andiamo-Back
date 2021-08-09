<?php   
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Helpers\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Mail;
use App\Mail\CodigoContraseña;

class UserController extends Controller
{

    /* Login */

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

    /* Editar perfil */

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

    /* Registrar usuario */

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

    /* Logout */

    public function logout(Request $request)
    {   
        auth()->logout();

        return response()->json([
            'success' => true
        ])->withCookie('token', null, time() - 3600, '/', null, false, true);
    }

    public function codigo(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user){
            return response()->json([
             'message' => 'Usuario no existe',
             'status_code' => 401
            ], 401);
            
        } else{

            $random = rand(111111, 999999);
            $user->verification_code = $random;
            $user->save();

            $correo = new CodigoContraseña($random);    
            Mail::to('nahuellopez@gmail.com')->send($correo);

            return response()->json([
                'message' => 'Email enviado con éxito',
                'status_code' => 200
               ], 200);

        }
    }

    public function passwordNew(Request $request)
    {
       /*  dd(request()->all()); */

        $request->validate([
            'email' => 'required|email',
            'verification_code' => 'required|integer',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email', $request->email)->where('verification_code', $request->verification_code)->first();

        /* dd($user); */
        if (!$user){

            return response()->json([
             'message' => 'User / código invalido',
             'status_code' => 401
            ], 401);

        } else{

            $user->password =  Hash::make($user->password);
            $user->verification_code = null;
            $user->save();
            
           
            return response()->json([
                'message' => 'Contraseña cambiada',
                'status_code' => 200
               ], 200);

            }

        
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
                'token' => $token,

            ]
        
        ])->withCookie('token', $token, auth()->factory()->getTTL() * 60, '/', null, false, true);
    }
}