<?php

namespace App\Http\Controllers\Fichaje;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Fichaje\PacienteStoreRequest;
use App\Http\Requests\Fichaje\PacienteUpdateRequest;
use App\Http\Controllers\Controller;
use App\Modelos\Fichaje\Paciente;
use App\People;
use Crypt;
class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = Paciente::with('people')->where('estado', '<>', 'eliminado')->get();

        return view('fichaje::pacientes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $data = Paciente::where('estado', '<>', 'eliminado')->get();;
        return view('fichaje::pacientes.create',compact('$data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteStoreRequest $request)
    {
        $people = People::create([
                'name'  =>  $request->nombre,
                'firstname' => $request->apellidop,
                'lastname'  =>  $request->apellidom,
                'ci'    =>  $request->ci
            ]);

        Paciente::create([
                'direccion' =>  $request->direccion,
                'fecha_nac' =>  $request->fecha_nacimiento,
                'genero'      =>  $request->genero,
                'ocupacion' =>  $request->ocupacion,
                'origen'    =>  $request->origen,
                'telef'     =>  $request->telef,
                'celular'   =>  $request->celular,
                'estado_civil'  =>  $request->estado_civil,
                'caso_emergencia'   =>  $request->caso_emergencia,
                'telf_opcional'     =>  $request->telef_opcional,
                'estado'    =>  'habilitado',
                'people_id' =>  $people->id
                
            ]);
        return redirect('fichaje/pacientes');

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
        $data = Paciente::with('people')->find($id);
        return view('fichaje::pacientes.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data = Paciente::with('people')->find($id);

        return view('fichaje::pacientes.edit', compact('data'));
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
        
        $id = Crypt::decrypt($id);
        $paciente = Paciente::find($id);

        $people = People::find($paciente->people_id)->update([
                'name'  =>  $request->nombre,
                'firstname' => $request->apellidop,
                'lastname'  =>  $request->apellidom
            ]);

        $paciente->update([
                'estado'    =>  $request->estado,
                'direccion' => $request->direcccion,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'celular' => $request->celular,
                'estado_civil' => $request->estado_civil,
                'ocupacion' => $request->ocupacion,
                'origen' => $request->origen,
            ]);

        
        return redirect('fichaje/pacientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paciente::find(Crypt::decrypt($id))->update([
            'estado'    =>  'eliminado'
            ]);

        return redirect('fichaje\pacientes');
    }
}
