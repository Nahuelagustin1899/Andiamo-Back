<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViajeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'destino_id' => 'required|exists:estacions,id',
            'salida_id' => 'required|exists:estacions,id',
            'empresa_id' => 'required|exists:empresas,id', 
            'nombre' => 'required|min:2|max:40',
            'precio' => 'required|numeric',
            'fecha_salida' => 'required',
            'fecha_llegada' => 'required', 
        ];
    }
}
