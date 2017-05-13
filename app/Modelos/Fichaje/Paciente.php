<?php

namespace App\Modelos\Fichaje;
use App\People;
use App\Modelos\Fichaje\Cita;
use Illuminate\Database\Eloquent\Model;
use App\Modelos\Hclinica\Antedecente;
use App\Modelos\Hclinica\Antheredfamiliar;
use App\Modelos\Hclinica\Antpersonal;
use App\Modelos\Hclinica\Antgineco;
use App\Modelos\Hclinica\Antperinatal;


class Paciente extends Model
{
    protected $table = 'paciente';
    protected $fillable = [
    	'direccion', 'fecha_nac', 'edad', 'genero', 'ocupacion',
    	'origen', 'telef', 'celular', 'estado_civil', 'caso_emergencia', 'telf_opcional','estado','people_id'
    ];

    public function people()
    {
        return $this->belongsTo(People::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function antedecente()
    {
        return $this->belongsTo(Antedecente::class);
    }

    public function antfamiliar()
    {
        return $this->belongsTo(Antheredfamiliar::class);
    }

    public function antpersonal()
    {
        return $this->belongsTo(Antpersonal::class);
    }


    public function antgineco()
    {
        return $this->belongsTo(Antgineco::class);
    }


    public function antperinatal()
    {
        return $this->belongsTo(Antperinatal::class);
    }
}
