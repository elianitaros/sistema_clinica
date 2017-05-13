<?php

namespace App\Http\Controllers\Hclinica;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modelos\Hclinica\Laboratorio;
use App\Modelos\Fichaje\Paciente;

use App\People;
use Auth;
use App\User;
use App\Modelos\Hclinica\HC;
use Session;
use App\Modelos\Fichaje\Cita;
use Crypt;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Laboratorio::with(['medico.people','paciente.people','hc_id'])->get();
        return view('hclinica::laboratorios.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id = Crypt::decrypt($id);
        $paciente = Paciente::where('id' ,$id)->where('estado','<>', 'eliminado')->first();
        $paciente->people;

        $data = Laboratorio::with(['medico.people','paciente.people','hc'])->get();

        $hc = HC::where('paciente_id' , $id)->first();

        return view('hclinica::laboratorio.create',compact('data','paciente','hc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        
        Laboratorio::create([
            'diagnostico'   =>$request->diagnostico,
            'hematologia'   =>$request->hematologia!==null?implode(',', $request->hematologia):'',
            'hormonas'      =>$request->hormonas!==null?implode(',',$request->hormonas):'',
            'marcadores'    =>$request->marcadores!==null?implode(',',$request->marcadores):'',
            'bioquimica'    =>$request->bioquimica!==null?implode(',',$request->bioquimica):'',
            'orina'         =>$request->orina!==null?implode(',',$request->orina):'',
            'tincion_gram'  =>$request->tincion_gram,
            'serologia'     =>$request->serologia!==null?implode(',',$request->serologia):'',
            'microbiologia' =>$request->microbiologia!==null?implode(',',$request->microbiologia):'',
            'citologia'     =>$request->citologia!==null?implode(',',$request->citologia):'',
            'preoperatorio' =>$request->preoperatorio!==null?implode(',',$request->preoperatorio):'',
            'parasitologia' =>$request->parasitologia!==null?implode(',',$request->parasitologia):'',
            'paciente_id'   =>  $request->paciente,
            'medico_id'     =>   Auth::user()->id,
            'hc_id'         =>  $id
        ]);

        
        /*if(Session::has('medico_'.Auth::user()->id)){
            Cita::find(Session::get('medico_'.Auth::user()->id))->update([
                'estado' => 'atendido',
            ]);

            session::forget('medico_'.Auth::user()->id);
        }*/


        return redirect('hclinica/solicitud/'.Crypt::encrypt($request->paciente));
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
        $lab = Laboratorio::with(['paciente.people','medico.people'])->find($id);
        return view('hclinica::laboratorio.show',compact('lab'));
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
}
