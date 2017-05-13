<?php

namespace App\Http\Requests\Fichaje;

use App\Http\Requests\Request;

class PacienteUpdateRequest extends Request
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
            'nombre'    => 'required|min:3|max:15',
            'apellidop' => 'max:50',
            'apellidom' => 'max:50',
            'direccion' => 'required|min:5|max:50',
            'fecha_nac' => 'required|date_format:format'
            'ocupacion' => 'required|min:5|max:20',
            'origen'    => 'required|min:3',
            'telef'     => 'required|numeric',
            'celular'   => 'required|numeric'
            'estado_civil' => 'required',
            'telf_opcional' => 'required|numeric'
        ];
    }
}
