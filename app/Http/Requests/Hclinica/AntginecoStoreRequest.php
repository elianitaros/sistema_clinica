<?php

namespace App\Http\Requests\Hclinica;

use App\Http\Requests\Request;

class AntginecoStoreRequest extends Request
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
            'menarca'           => 'required|min:2|max:15',
            'telarca'           => 'required|min:2|max:15',
            'ritmo_menstrual'   => 'required',
            'dismenorrea'       => 'required',
            'fum'               => 'required',
            'parejas'           => 'required',
            'gesta'             => 'integer',
            'aborto'            => 'integer',
            'parto'             => 'integer',
            'cesarea'           => 'integer',
            'fup'               => 'required',
            'men_climaterio'    => 'required|min:3|max:30',    
            'metodo_planificacion'  => 'required',
            'descripcion'       => 'min:6|max:30',
            'pap'               => 'required',
            'descripcion1'      => 'min:3|max:15',
            'mamografia'        => 'required',
           
        ];
    }
}
