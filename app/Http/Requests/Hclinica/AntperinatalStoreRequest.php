<?php

namespace App\Http\Requests\Hclinica;

use App\Http\Requests\Request;
use App\Modelos\Hclinica\Antperinatal;

use App\Modelos\Fichaje\Paciente;
use Auth;
use App\User;
use Carbon\Carbon;
class AntperinatalStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() 
    {

        $paciente = Paciente::all();
        $birthday = explode('-', $paciente->fecha_nac);
        $edad = Carbon::createFromDate($birthday[0], $birthday[1], $birthday[2])->age;
        $medico = User::All();
        

       if($edad<10){
        return true; 
       }
         
        else 
            return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'numero_hijo'       => 'required|integer',
            'meses_gestacion'   => 'required|integer',
            'sitio_nac'         => 'required',        
            'descripcion'       => 'min:4|max:30',
            'tipo_nac'          => 'required',
            'peso'              => 'required',
            'talla'             => 'required',
            'problemas_nac'     => 'required',
            'especificacion'    => 'min:4|max:30',
            'paciente_id'       => 'required',
            'medico_id'         => 'required',
        ];
    }
}
