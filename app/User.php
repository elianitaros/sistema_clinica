<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Modelos\Admin\Especialidad;
use App\Modelos\Admin\Horario;
use App\Modelos\Fichaje\Cita;
use App\Modelos\Hclinica\Antecedente;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password', 'username', 'people_id', 'especialidad_id', 'type', 'estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function people()
    {
        return $this->belongsTo(People::class); 
    }

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
    public function cita()
    {
        return $this->hasMany(Cita::class, 'users_id', 'id');

    }

     public function antecedente()
    {
        return $this->belongsTo(Antecedente::class);

    }
}
