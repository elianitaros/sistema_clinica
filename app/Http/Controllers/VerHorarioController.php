<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Modelos\Admin\Horario;
use App\User;
use App\People;


class VerHorarioController extends Controller
{
   
    public function horarios()
    {
        //$data = Horario::with(['medico.people'])->get();
        $data = Horario::with(['medico.people'])->where('estado', '<>', 'eliminado')->get();

        return view('admin::horario', compact('data'));
        
    }
}
