<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Helpers\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class EmpresaController extends Controller
{
  
    public function index()
    {
        $empresas = Empresa::all();
        return response()->json(['data' => $empresas]);
    }

  
    public function delete($id)
    {
        $empresa = Empresa::findOrFail($id);

        $empresa->delete();

        return response()->json(['success' => true,'data' => $empresa]);

    }

  
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'string|max:30',
            'informacion' => 'string|max:250'

        ]);


        $data = $request->all();

        if(!empty($data['logo'])) {
            $logo = Image::make($data['logo']);
            $nombreLogo = Str::slug($data['nombre']) . File::mimeToExtension($logo->mime());
            $logo->fit(100, 100, function($constraint) {
                $constraint->upsize();
            })->save(public_path('imgs/empresas/logos/' . $nombreLogo));

            $data['logo'] = $nombreLogo;
        }

        $empresa = Empresa::create($data);

        return response()->json([
            'success' => true,
            'data' => $empresa
        ]);
    }

    public function edit(Request $request,$id)  
    {
        
        $empresa = Empresa::findOrFail($id);  
        $data = $request->all();

         if($request->logo) {
            $nombreLogo = date('YmdHis') . "." . $request->logo->extension();
            $request->file('logo')->move(public_path('imgs/empresas/logos/'), $nombreLogo);
            $data['logo'] = $nombreLogo;
            $imagenActual = $empresa->logo;
        }    
 
        $empresa->update($data); 

             if(isset($imagenActual) && !empty($imagenActual)) {
            unlink(public_path('imgs/empresas/logos/' . $imagenActual));
            }    

         return response()->json(['data' => $empresa]); 
    }

    
}
