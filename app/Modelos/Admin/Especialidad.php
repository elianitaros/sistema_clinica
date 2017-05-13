<?php

namespace App\Modelos\Admin;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Especialidad extends Model
{
    protected $table = 'especialidad';

    protected $fillable = [
        'nombre', 'estado', 'color'
    ];

    public function medico()
    {
        return $this->hasMany(User::class);
    }

}
