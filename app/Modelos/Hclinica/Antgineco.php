<?php

namespace App\Modelos\Hclinica;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Modelos\Fichaje\Paciente;

class Antgineco extends Model
{
    protected $table = 'antgineco';
    
    protected $fillable = [
    	'menarca','telarca','ritmo_menstrual','dismenorrea', 'fum',  'parejas','gesta', 'aborto', 'parto',
        'cesarea', 'fup','men_climaterio', 'metodo_planificacion', 'descripcion',  'pap', 'descripcion1', 'mamografia', 'paciente_id', 'medico_id'
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
