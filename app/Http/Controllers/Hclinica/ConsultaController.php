<?php

namespace App\Http\Controllers\Hclinica;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modelos\Fichaje\Paciente;
use App\Modelos\Fichaje\Cita;

use App\Modelos\Hclinica\Antecedente;
use App\Modelos\Hclinica\Antperinatal;
use App\Modelos\Hclinica\Antheredfamiliar;
use App\Modelos\Hclinica\Antpersonal;
use App\Modelos\Hclinica\Antgineco;
use App\Modelos\Hclinica\Receta;
use App\Modelos\Hclinica\DescripcionMedicamento;
use App\Modelos\Hclinica\ExaResultado;
use App\Modelos\Hclinica\HC;
use App\Modelos\Hclinica\Laboratorio;
use Auth;
use Session;
use Crypt;

use App\User;
use Carbon\carbon;
class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $date_init = Carbon::now()->toDateString();
        //$date_end = Carbon::now()->addDay(10)->toDateString();
        $date_end = Carbon::now()->addDay(1)->toDateString();

        $data = Cita::with('paciente.people')->where('medico_id', Auth::user()->id)->whereBetween('fecha_consulta', [$date_init , $date_end])->orderBy('created_at','DESC')->get();
        //->orderBy('created_at','asc') ->get();
                //->whereBetween('fecha_consulta', [$date_init , $date_end])
               

        return view('hclinica::consultas.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) 
    {
        $id = Crypt::decrypt($id);
        $cita = Cita::where('paciente_id', $id)->where('estado', '<>', 'atendido')->first();

        $antecedente =Antecedente::where('paciente_id', $cita->paciente_id)->get();
        //dd($antecedente);
        $data = Paciente::where('estado', '<>', 'eliminado')->where('id', $cita->paciente_id)->first();
        $data->people;
        //dd($data);
        
        if(Session::has('medico_'.Auth::user()->id))
        {
            session::forget('medico_'.Auth::user()->id);
            session::put('medico_'.Auth::user()->id, $cita->id);
        }
        else
            session::put('medico_'.Auth::user()->id, $cita->id);

        /*$recetas = Receta::where('paciente_id', $id)->get();

        $examenes = Examen::all();*/
        $receta = Receta::where('paciente_id',$cita->paciente_id)->get();
        $laboratorio = Laboratorio::where('paciente_id',$cita->paciente_id)->get();
        $personal = Antpersonal::where('paciente_id', $cita->paciente_id)->get();
        $perinatal =Antperinatal::where('paciente_id', $cita->paciente_id)->get();
        $familiar =Antheredfamiliar::where('paciente_id', $cita->paciente_id)->get();
        $gineco =Antgineco::where('paciente_id', $cita->paciente_id)->get();
        $perinatal =Antperinatal::where('paciente_id', $cita->paciente_id)->get();
        $examen = ExaResultado::where('hc_id', $cita->paciente_id)->get();
        $hc = HC::where('paciente_id', $cita->paciente_id)->get();
        return view('hclinica::consultas.create2',compact('data','antecedente','examen','perinatal','familiar','personal','gineco','hc','laboratorio','receta'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //$paciente = Paciente::find($id);

        //$antecedente = Antecedente::find($id)->get
        $id = Crypt::decrypt($id);

        HC::create([
                'peso' => $request->peso,
                'talla' => $request->talla,
                'presion' => $request->presion,
                'temperatura' => $request->temperatura,
                'grados' =>$request->grados,
                'subjetivo'  =>  $request->subjetivo,
                'objetivo' =>  $request->objetivo,
                'analisis'  =>  $request->analisis,
                'plan'  => $request->plan,
                'antecedente_id' => $id,
                'paciente_id' => $id,
                'medico_id'  => Auth::user()->id
            ]);

        return redirect('hclinica/solicitud/'.Crypt::encrypt($id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        //$cita = Cita::find($id);
        $hc = HC::with(['paciente.people'])->find($id);
        return view('hclinica::consultas.show',compact('hc'));
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


    public function solicitud($id)
    {
        $id = Crypt::decrypt($id);
        $data = Paciente::find($id);

        return view('hclinica::consultas.solicitud',compact('data'));
    }

    public function finalizar()
    {
        if(Session::has('medico_'.Auth::user()->id)){
            Cita::find(Session::get('medico_'.Auth::user()->id))->update([
                'estado' => 'atendido'
            ]);

            session::forget('medico_'.Auth::user()->id);
        }
        return redirect('hclinica/g');
    }
}
