<?php

namespace App\Http\Controllers\Reportes;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modelos\Fichaje\Cita;

class FichajeController extends Controller
{
	public function citasView()
    {
    	return view('vendor.clinica.Reportes.Fichaje.reporte_citas');
    }

    public function citasData(Request $request)
    {
    	$data = '';
    	if($request->tipo === 'all')
    		$data = Cita::with(['paciente.people','medico.people'])
                ->whereBetween('created_at', [$request->fecha_inicio, $request->fecha_fin])
                ->get();
    	else
    		$data = Cita::with(['paciente.people','medico.people'])
                    ->whereBetween('created_at', [$request->fecha_inicio, $request->fecha_fin])
    		      ->where('estado', 'atendido')
    		      ->get();

    	$dates['fecha_fin'] = $request->fecha_fin;
    	$dates['fecha_inicio'] = $request->fecha_inicio;
    	$dates['tipo'] = $request->tipo;

    	$view = \View::make('vendor.clinica.Reportes.Fichaje.citas', compact('data', 'dates'))->render();

    	$pdf = \App::make('dompdf.wrapper');


    	$pdf->loadHTML($view)->setPaper('letter', 'portrait')->setWarnings(true);

    	return $pdf->stream();
    }

    
}
