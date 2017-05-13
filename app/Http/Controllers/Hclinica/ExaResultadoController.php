<?php

namespace App\Http\Controllers\Hclinica;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modelos\Hclinica\ExaResultado;
use App\Modelos\Hclinica\HC;
use App\Modelos\Fichaje\Paciente;
use App\User;
use Crypt;
class ExaResultadoController extends Controller
{
    public function create($id)
    {
        $id = Crypt::decrypt($id);
        $paciente = Paciente::find($id);
        $paciente->people;
        $data = ExaResultado::with(['medico.people','paciente.people','hc'])->get();

        $hc = HC::where('paciente_id' , $id)->first();

        return view('hclinica::resultados.create',compact('data','paciente','hc'));
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
        $paciente = Paciente::find($id);
       
        $medico = User::All();
       	$hc = HC::where('paciente_id' , $id)->first();
        $img = $imagen->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($img,  \File::get($imagen));

        ExaResultado::create([
            'nombre' => $request->nombre,
            'imagen' => $img,
            'hc_id'  => $hc->id
        ]); 

        return redirect('hclinica/create/'.Crypt::encrypt($id));
        /**<img src="{{ asset('public/storage/'. $row->image)">**/
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

}
