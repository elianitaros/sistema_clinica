<?php

namespace App\Modelos\Hclinica;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Modelos\Fichaje\Paciente;

class Antheredfamiliar extends Model
{
    protected $table = 'antheredfamiliar';

    protected $fillable = [ 
    	 'cardiovascular','descripcion','endrocrino','descripcion1','neurlogico','descripcion3',
    	 'respiratorio','descripcion4', 'paciente_id', 'medico_id'
           
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
