<?php

namespace App\Modelos\Hclinica;

use Illuminate\Database\Eloquent\Model;

class ExamenComplementario extends Model
{
  	protected  $table = 'examencomplementario';

  	protected $fillable = [

  			'descripcion' ,'paciente_id','medico_id', 'hc_id'];


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