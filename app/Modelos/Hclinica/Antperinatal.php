<?php

namespace App\Modelos\Hclinica;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Modelos\Fichaje\Paciente;

class Antperinatal extends Model
{
	protected $table = 'antperinatal';

	protected $fillable = [
		'numero_hijo', 'meses_gestacion','sitio_nac',
		'descripcion','tipo_nac','peso','talla','problemas_nac','especificacion', 'paciente_id', 'medico_id'
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
