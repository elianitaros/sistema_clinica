<?php

namespace App\Modelos\Hclinica;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Fichaje\Paciente;
use App\User;

class Receta extends Model
{
     protected $table = 'receta';

     protected $fillable = [ 'descripcion','estado','detalle_id','hc_id','paciente_id','medico_id' ];

    public function detalle()
    {
        return $this->hasMany(DetalleReceta::class);
    }
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
