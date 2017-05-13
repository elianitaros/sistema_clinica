<?php

namespace App\Http\Controllers\Hclinica;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modelos\Fichaje\Paciente;
use App\Modelos\Hclinica\ExamenComplementario;
use App\People;
use Auth;
use App\User;
use App\Modelos\Hclinica\HC;
use App\Modelos\Fichaje\Cita;
use Session;
use Crypt;
class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id = Crypt::decrypt($id);
        $paciente = Paciente::find($id);
        $paciente->people;
        $data = ExamenComplementario::with(['medico.people','paciente.people','hc'])->get();
        $hc = HC::where('paciente_id' , $id)->first();
        return view('hclinica::examenes.create',compact('data','paciente','hc'));

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
        ExamenComplementario::create([
            'descripcion'   =>  $request->descripcion,
            'paciente_id'   =>  $request->paciente,
            'medico_id'     =>   Auth::user()->id,
            'hc_id'         =>  $id
        ]);
        
        if(Session::has('medico_'.Auth::user()->id)){
            Cita::find(Session::get('medico_'.Auth::user()->id))->update([
                'estado' => 'atendido',
            ]);

            session::forget('medico_'.Auth::user()->id);
        }


        return redirect('hclinica/g');
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
}
