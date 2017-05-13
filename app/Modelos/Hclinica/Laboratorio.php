<?php

namespace App\Modelos\Hclinica;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Fichaje\Paciente;
use App\User;
class Laboratorio extends Model
{
    protected $table = 'laboratorio';

    protected $fillable = ['diagnostico','hematologia', 'hormonas','marcadores','bioquimica','orina','tincion_gram',
    						'serologia','microbiologia','citologia','preoperatorio','parasitologia','paciente_id','medico_id', 'hc_id'];
    
    

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


