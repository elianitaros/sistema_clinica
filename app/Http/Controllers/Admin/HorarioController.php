<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Admin\HorarioStoreRequest;
use App\Http\Controllers\Controller;
use App\Modelos\Admin\Horario;
use App\User;
use App\People;

use DB;
use Carbon\Carbon;
use Crypt;
class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Horario::with(['medico.people'])->get();

        return view('admin::horarios.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = User::with('people')->where('type', 'medico', 'estado')->get();

        return view('admin::horarios.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HorarioStoreRequest $request)
    {
        $especialidad = User::find($request->medico);

        Horario::create([
                'turno'  =>  $request->turno,
                'started_at' => $request->fecha_inicio,
                'finished_at' => $request->fecha_fin,
                'hora_i' => $request->hora_inicio,
                'estado'    =>  'habilitado',

                'hora_f' => $request->hora_fin,
                'tiempo_consulta' =>$request ->tiempo,
                'medico_id' => $request->medico,
                'especialidad_id'=> $especialidad->especialidad_id
            ]);
         



        return redirect('admin/horarios');
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
        $id = Crypt::decrypt($id);
        $data = Horario::with('medico.people')->find($id);

        return view('admin::horarios.edit', compact('data'));
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

        $people = Horario::find($id)->update([
                'turno'  =>  $request->turno,
                'started_at' => $request->fecha_inicio,
                'finished_at' => $request->fecha_fin,
                'hora_i' => $request->hora_inicio,
                'hora_f' => $request->hora_fin,
                'estado' => 'habilitado'
                
            ]);
        return redirect('admin/horarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*Horario::with('medico.people')->find(Crypt::decrypt($id))->delete($id);

        return ['deleted' => true];*/


        Horario::with('medico.people')->find(Crypt::decrypt($id))->delete();
        return redirect('admin\horarios')
                        ->with('success','Item deleted successfully');
    }
}
