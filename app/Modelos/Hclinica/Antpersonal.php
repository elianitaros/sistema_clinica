<?php

namespace App\Modelos\Hclinica;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Modelos\Fichaje\Paciente;

class Antpersonal extends Model
{
   protected $table = 'antpersonal';

   protected $fillable = 
   [
   		'a','descripcion', 'tabaquismo', 'alcohol', 'drogas',
	    'inmunizaciones', 'descripcion1', 'enfermedad_infecciosa', 'descripcion2', 'paciente_id', 'medico_id'
   ];

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
        return $this->HasOne(HC::class);
    }
	     
}
