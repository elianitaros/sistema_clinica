<?php

namespace App\Http\Controllers\Fichaje;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use App\Modelos\Fichaje\Cita;
use App\Modelos\Admin\Horario;
use Crypt;

class DataController extends Controller
{
    public function medicos(Request $request, $id)
    {
        
        $data =  Horario::with('medico.people')->where('especialidad_id', $id)->get();
		return response()->json($data);
    }
    /*
    	function return al cites
    */

    public function citas(Request $request, $medicos){

    	if($medicos === 'all')
        {
    		$citas = Cita::with('medico.especialidad')->get();
    		$data = array();

    		foreach ($citas as $row) 
    		{
    			$start = $row->fecha_consulta.' '.$row->hora_consulta;
    			$date = explode('-', $row->fecha_consulta);
    			$hour = explode(':', $row->hora_consulta);
    			$end = Carbon::create($date[0], $date[1], $date[2], $hour[0], $hour[1], $hour[2])->addMinute($row->tiempo_consulta);
    			$tmp = array('title' => $row->medico->name. $end->toTimeString(), 'start' =>$start ,'end' => $end->toDateTimeString() ,  'backgroundColor' => $row->medico->especialidad->color, 'borderColor' => $row->medico->especialidad->color);
    			array_push($data, $tmp);
    		}
    		return json_encode($data);

       	}
    	else
    	{

    		$citas = Cita::where('medico_id' , $medicos )->get();
    		$data = array();

    		foreach ($citas as $row) 
    		{
    			$start = $row->fecha_consulta.' '.$row->hora_consulta;
    			$date = explode('-', $row->fecha_consulta);
    			$hour = explode(':', $row->hora_consulta);
    			$end = Carbon::createFromDate($date[0], $date[1], $date[2]);
    			$tmp = array('title' => 'cita', 'start' =>$start ,'end' => $end->toDateTimeString() ,  'backgroundColor' => '#f56954', 'borderColor' => '#f56954' );
    			array_push($data, $tmp);
    		}
    		return json_encode($data);

    	}
    }
}
