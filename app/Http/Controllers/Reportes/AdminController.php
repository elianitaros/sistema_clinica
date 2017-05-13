<?php

namespace App\Http\Controllers\Reportes;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Modelos\Hclinica\Receta;
use App\Modelos\Hclinica\Laboratorio;
use App\Modelos\Hclinica\ExamenComplementario;
use Crypt;

use App\Modelos\Fichaje\Cita;

class AdminController extends Controller
{
    public function usuarios()
    {
    	User::whereBetween('created_at', [$request->star_date, $request->end_date])->get();
    	$data = User::all();


    	$view = \View::make('vendor.clinica.Reportes.Admin.usuarios', compact('data'))->render();

    	$pdf = \App::make('dompdf.wrapper');


    	$pdf->loadHTML($view)->setPaper('letter', 'portrait')->setWarnings(true);

    	return $pdf->stream();
    }

    public function receta($id)
    {
       
    	$id = Crypt::decrypt($id);

    	$data = Receta::with(['paciente.people','medico.people','detalle'])->where('hc_id',$id )->orderBy('created_at','desc')->first();
    	$data;

    	$view = \View::make('vendor.clinica.Reportes.hclinica.receta', compact('data'))->render();

    	$pdf = \App::make('dompdf.wrapper');


    	$pdf->loadHTML($view)->setPaper(array(0, 0, 612.00, 396.00), 'portrait')->setWarnings(true);

    	return $pdf->stream();
    }

    public function laboratorio($id)
    {
        $id = Crypt::decrypt($id);


        $data = Laboratorio::with(['paciente.people','medico.people'])->where('paciente_id',$id )->orderBy('created_at','DESC')->first();
     

        

        $view = \View::make('vendor.clinica.Reportes.hclinica.laboratorio', compact('data'))->render();

        $pdf = \App::make('dompdf.wrapper');


        /*$pdf->loadHTML($view)->setPaper('letter', 'portrait')->setWarnings(true);
        //$pdf->loadHTML($view)->setPaper(array(0, 0, 612.00, 396.00), 'portrait')->setWarnings(true);

        return $pdf->stream();*/

        $pdf->loadHTML($view)->setPaper('letter', 'portrait')->setWarnings(true);

        return $pdf->stream();
    }


    public function examen($id)
    {
    	$id = Crypt::decrypt($id);
        $data = ExamenComplementario::with(['paciente.people','medico.people','detalle'])->where('hc_id',$id )->orderBy('created_at','desc')->first();
        

        $view = \View::make('vendor.clinica.Reportes.hclinica.examen', compact('data'))->render();

        $pdf = \App::make('dompdf.wrapper');


        $pdf->loadHTML($view)->setPaper(array(0, 0, 612.00, 396.00), 'portrait')->setWarnings(true);

        return $pdf->stream();
    }

    public function citas()
    {
    	$data = User::with(['people','especialidad'])->where('estado', '<>', 'eliminado')->where('type', 'medico')->get();

    	return view('vendor.clinica.Reportes.hclinica.citas', compact('data'));
    }

    public function citaspdf(Request $request)
    {	
    	if($request->medico === 'all')
    		$data = Cita::with(['paciente.people','medico.people'])
	    		->whereBetween('created_at', [$request->fecha_inicio, $request->fecha_fin])
	    		->get();
    	else
			$data = Cita::with(['paciente.people','medico.people'])
	    		->where('medico_id', $request->medico)
	    		->whereBetween('created_at', [$request->fecha_inicio, $request->fecha_fin])
	    		->get();

    	$view = \View::make('vendor.clinica.Reportes.hclinica.citaspdf', compact('data', 'request'))->render();

    	$pdf = \App::make('dompdf.wrapper');

    	$pdf->loadHTML($view)->setPaper('letter', 'portrait')->setWarnings(true);

    	return $pdf->stream();
    }
    
}
