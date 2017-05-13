<?php

namespace App\Modelos\Admin;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Horario extends Model
{
   protected $table = 'horario';

   protected $fillable = [
   		'turno','started_at','finished_at','hora_i', 'hora_f','tiempo_consulta', 'medico_id','especialidad_id','estado'
   ];

   public function user()
   {
        return $this->belongsTo(User::class);
   }
    public function medico()
   {
        return $this->belongsTo(User::class);
   }

   public function especialidad()
   {
        return $this->belongsTo(Especialidad::class);
   }
}

