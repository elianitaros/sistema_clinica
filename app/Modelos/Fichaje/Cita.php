<?php

namespace App\Modelos\Fichaje;

use Illuminate\Database\Eloquent\Model;
use App\User;



class Cita extends Model
{
	protected $table = 'cita';

	protected $fillable = [
		'tipo_consulta', 'fecha_consulta', 'hora_consulta', 'tiempo_consulta','estado','users_id','medico_id','paciente_id'
	];

    public function user()
    {               
        return $this->belongsTo(User::class, 'users_id', 'id');

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
