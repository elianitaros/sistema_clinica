<?php

namespace App\Http\Requests\Fichaje;

use App\Http\Requests\Request;

class PacienteStoreRequest extends Request
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
            'nombre'    =>  'required|min:3|max:25',
            'apellidop' =>  'max:25',
            'apellidom' =>  'max:25',
            'direccion' =>  'required|min:5|max:30',
            'fecha_nacimiento' =>  'required',
            'genero'      =>  'required',
            'ocupacion' =>  'required|min:5|max:25',
            'origen'    =>  'required',
            'telef'     =>  'numeric',
            'celular'   =>  'numeric',
            'estado_civil' =>   'required',
            'caso_emergencia' =>    'min:5|max:30',
            'telef_opcional' =>  'numeric'
        ];
    }
}
