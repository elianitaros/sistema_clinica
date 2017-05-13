<?php

namespace App\Modelos\Hclinica;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Fichaje\Persona;
use App\User;
use App\Modelos\Fichaje\Paciente;

class ExaResultado extends Model
{
    protected $table = 'exa_resultados';

    protected $fillable = [ 
    	'nombre', 'imagen', 'hc_id'
    ];

    public function hc()
    {
    	return $this->belongsTo(HC::class);
    }
    public function medico()
    {
        return $this->belongsTo(User::class);
    }
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

}
