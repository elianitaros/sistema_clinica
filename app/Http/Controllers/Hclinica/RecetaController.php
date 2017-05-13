<?php

namespace App\Http\Controllers\Hclinica;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modelos\Hclinica\DetalleReceta;
use App\Modelos\Hclinica\Receta;
use App\Modelos\Fichaje\Paciente;
use App\Modelos\Hclinica\HC;
use App\User;
use DB;

use App\People;
use Auth;
use App\Modelos\Fichaje\Cita;
use Crypt;
class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id = Crypt::decrypt($id);
        $productos = DB::connection('mysql2')->table('productos')->get();

        $paciente = Paciente::where('id' ,$id)->where('estado','<>', 'eliminado')->first();
        $paciente->people;
        $data = Receta::with(['detalle','medico.people','paciente.people','hc'])->get();

        $hc = HC::where('paciente_id' , $id)->first();

        return view('hclinica::recetas.create',compact('data','paciente','hc','productos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //return $request->productos;

        $id = Crypt::decrypt($id);
        $receta = Receta::create([
                    'descripcion' =>    $request->descripcion,
                    'estado'      =>    'pendiente',
                    'paciente_id'   =>  $request->paciente,
                    'medico_id'     =>   Auth::user()->id,
                    'hc_id'         =>  $id
                    ]); 

        $productos = DB::connection('mysql2')->table('productos')->whereIn('id', $request->productos )->get();
        foreach ($productos as $key ) {
            $detalle = DetalleReceta::create([
            'prducto_id' => $key->id,
            'nombre_generico' => $key->nombre_generico,
            'precio' => $key->precio_venta,
            'unidad' => $key->unidad,
            'receta_id' => $receta->id
        ]);
    }


               

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
        $rec = Receta::with(['paciente.people','medico.people','detalle'])->find($id);
        return view('hclinica::recetas.show',compact('rec'));
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
