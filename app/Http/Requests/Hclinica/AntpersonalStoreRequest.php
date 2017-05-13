<?php

namespace App\Http\Requests\Hclinica;

use App\Http\Requests\Request;

class AntpersonalStoreRequest extends Request
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
            'a'                 => 'min:2',
            'descripcion'       => 'min:4|max:30',
            'tabaquismo'        => 'required',
            'alcohol'           => 'required',
            'drogas'            => 'required',
            'inmunizaciones'    => 'required',
            'descripcion1'      => 'min:4|max:30',
            'enfermedad_infecciosa' => 'min:4|max:40',
            
            
        ];
    }
}
