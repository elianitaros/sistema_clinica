<?php

namespace App\Modelos\Hclinica;


use Illuminate\Database\Eloquent\Model;
use App\Modelos\Fichaje\Persona;
use App\User;
use App\Modelos\Fichaje\Paciente;

class Antecedente extends Model
{

	protected $table = 'antecedente';
	
	protected $fillable =	[ 'alergia', 'grupo_sanguineo', 'rh', 'paciente_id', 'medico_id','' ];

    
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico()
    {
        return $this->belongsTo(User::class);
    }

    public function hc()
    {
        return $this->belongsTo(HC::class);
    }
            
}
