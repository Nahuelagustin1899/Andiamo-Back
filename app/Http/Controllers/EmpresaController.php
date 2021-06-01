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
    /**
    *@param null
    *@method retorna todas las empresas
    *@return json
    *@author
    *28-05-2021
    */
    public function index()
    {
        $empresas = Empresa::all();
        return response()->json(['data' => $empresas]);
    }

    /**
    *@param id empresa
    *@method elimina una empresa en especifico
    *@return json
    *@author
    *28-05-2021
    */
    public function delete($id)
    {
        $empresa = Empresa::findOrFail($id);

        $empresa->delete();

        return response()->json(['success' => true,'data' => $empresa]);

    }

    /**
    *@param Request
    *@method Guarda una empresa, nombre informacion y logo
    *@return json
    *@author
    *28-05-2021
    */
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

    
}
