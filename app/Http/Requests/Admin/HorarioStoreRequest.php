<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class HorarioStoreRequest extends Request
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
          'turno'       => 'required',
          'fecha_inicio'  => 'required',
          'fecha_fin' => 'required',
          'hora_inicio'      => 'required',
          'hora_fin'      => 'required',
          'tiempo' => 'required',
          'medico'   =>  'required',
        ];
    }
}
