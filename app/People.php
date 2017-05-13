<?php

namespace App;
use App\Modelos\Fichaje\Paciente;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'people';

    protected $fillable = [
        'ci','name', 'firstname', 'lastname'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class);
    }
}