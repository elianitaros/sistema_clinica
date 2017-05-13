<?php

namespace App\Http\Controllers\Hclinica;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\user;
use App\People;
use App\Modelos\Fichaje\Paciente;
use App\Modelos\Hclinica\Antecedente;
use App\Modelos\Hclinica\Receta;
use App\Modelos\Hclinica\Laboratorio;
use App\Modelos\Hclinica\Examen;
use App\Modelos\Hclinica\HC;

class HistoriaClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::with('persona')->get();
        return view('hclinica::hc.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Paciente::all();
        return view('hclinica::hc.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $persona = Paciente::all();
            HC::create([
                'subjetivo'  =>  $request->subjetivo,
                'objetivo' =>  $request->objetivo,
                'analisis'  =>  $request->analisis,
                'plan'  => $request->plan,
                'persona_id' => $persona->id
            ]);

        return redirect('hc/pacientes',compact('$persona'));
        
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
