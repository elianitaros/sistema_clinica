<?php

namespace App\Http\Controllers\Fichaje;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Modelos\Admin\Especialidad;
use App\Modelos\Fichaje\Cita;
use Auth;
use App\People;
use App\User;
use Carbon\Carbon;
use App\Modelos\Fichaje\Paciente;
use App\Modelos\Admin\Horario;

use DB;
use Crypt;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date_init = Carbon::now()->toDateString();
        $date_end = Carbon::now()->addDay(10)->toDateString();
        
        $data = People::all();

        $data = Cita::with(['user.people', 'medico.people', 'medico.especialidad', 'medico.horario' ,'paciente'])->get();
        //->whereBetween('fecha_consulta', [$date_init, $date_end])
        //->get();

        return view('fichaje::citas.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Paciente::with('people')->get();

        $especialidades = Especialidad::all();

        return view('fichaje::citas.create',compact('data', 'especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // arreglar esta parte
        $hora = Horario::where('medico_id',$request->medico )->first();
        
        $fecha_inicio =$hora->started_at;
        $fecha_fin = $hora->finished_at;
        //dd($fecha_inicio , $fecha_fin);

        $hora_inicio = explode(':', $hora->hora_i);
        $h1 = Carbon::createFromTime( $hora_inicio[0], $hora_inicio[1], $hora_inicio[2]);

        $hora_fin = explode(':' ,$hora->hora_f);
        $h2 = Carbon::createFromTime( $hora_fin[0], $hora_fin[1], $hora_fin[2]);


         
        $cita = new Cita;
        $cita->tipo_consulta = $request->tipo_consulta;
        $cita->fecha_consulta = $request->fecha_consulta;
        if( $request->fecha_consulta >= $fecha_inicio && $request->fecha_consulta <= $fecha_fin )
        {

                $cita->hora_consulta = $request->hora_consulta;
                $hor = explode(':',$request->hora_consulta);
                $h = Carbon::createFromTime( $hor[0], $hor[1], $hor[2]);

                $last = Carbon::now()->addYear(1)->toDateString();
                //dd($last);
                $now = Carbon::now()->toDateString();

                $horas_cita = Cita::whereBetween('fecha_consulta', [$now, $last])->get();
                //dd($horas_cita);

                if($h>= $h1 && $h<=$h2)

                {
                    if( $this->validar_hora($horas_cita, $request->hora_consulta))
                    {

                        $cita->tiempo_consulta = $hora->tiempo_consulta;
                        $cita->estado        = 'activo';
                        $cita->users_id  = Auth::user()->id;
                        $cita->medico_id = $request->medico;
                        $cita->paciente_id = $request->paciente;
                        $cita->save();    
                    }
                    else
                     {
                        Session::flash('msg_title', 'error');
                        Session::flash('msg_description', 'la hora selecionada no correponde con los horarios del medico, seleccione otra fecha');
                        Session::flash('msg_type', 'danger');   

                        return back()->with(['msg' => 'la hora selecionada no correponde con los horarios del medico, seleccione otra fecha']);
                    }

                   

                    return redirect('fichaje/citas');       
                }
                else
                {
                    Session::flash('msg_title', 'error');
                    Session::flash('msg_description', 'la hora selecionada no correponde con los horarios del medico, seleccione otra fecha');
                    Session::flash('msg_type', 'danger');   

                    return back()->with(['msg' => 'la hora selecionada no correponde con los horarios del medico, seleccione otra fecha']);
                }

                 
            

          
        }
        else
        {
            Session::flash('msg_title', 'error');
            Session::flash('msg_description', 'la fecha selecionada no correponde con los horarios del medico, seleccione otra fecha');
            Session::flash('msg_type', 'danger');   

            return back()->with(['msg' => 'la fecha selecionada no correponde con los horarios del medico, seleccione otra fecha']);
        }
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    private function validar_hora($citas, $hora)
    { 
        foreach($citas as $cita)
        {
            $hora_fin = Carbon::createFromTime(explode(':', $cita->hora_consulta)[0], explode(':', $cita->hora_consulta)[1], explode(':', $cita->hora_consulta)[2]);
            $hora_fin = $hora_fin->addMinutes($cita->tiempo_consulta);


            $hora_select = Carbon::createFromTime(explode(':', $hora)[0], explode(':', $hora)[1], explode(':', $hora)[2]);

            if($hora_select == $hora_fin)
                return false;

        }

        return true;
    }
}
