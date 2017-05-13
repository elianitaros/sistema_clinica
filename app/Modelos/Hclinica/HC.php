<?php

namespace App\Modelos\Hclinica;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Modelos\Fichaje\Paciente;

class HC extends Model
{
    protected $table = 'historiaclinica';

    protected $fillable = [
   	    'peso','talla','subjetivo', 'objetivo','analisis', 'plan', 'paciente_id','medico_id','antecedente_id',             
        'antheredfamiliar_id','antpersonal_id','antperinatal_id','antgineco_id','presion','temperatura','grados'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
    public function medico()
    {
        return $this->belongsTo(User::class);
    }

    public function laboratorio()
    {
        return $this->hasMany(laboratorio::class);
    }

    public function examen()
    {
        return $this->hasMany(ExamenComplementario::class);
    }
    public function resultado()
    {
        return $this->hasMany(ExaResultado::class);
    }
    public function receta()
    {
        return $this->hasmany(Receta::class);
    }

    public function antecedente()
    {
        return $this->belongsTo(Antecedente::class);
    }
    public function antheredfamiliar()
    {
        return $this->belongsTo(Antheredfamiliar::class);
    }
    public function antpersonal()
    {
        return $this->belongsTo(Antpersonal::class);
    }
    public function antperinatal()
    {
        return $this->belongsTo(Antperinatal::class);
    }
    public function antgineco()
    {
        return $this->belongsTo(Antgineco::class);
    }
    
}
