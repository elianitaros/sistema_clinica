<?php

namespace App\Http\Controllers\Hclinica;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Hclinica\AntecedenteStoreRequest;

use App\Modelos\Hclinica\Antperinatal;
use App\Modelos\Hclinica\Antpersonal;
use App\Modelos\Hclinica\Antheredfamiliar;
use App\Modelos\Hclinica\Antgineco;
use App\Modelos\Hclinica\Antecedente;
use App\Modelos\Fichaje\Paciente;
use Auth;
use App\User;
use Carbon\Carbon;
use Session;
use App\Modelos\Fichaje\Cita;
use Crypt;


class AntecedenteController extends Controller
{
    

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
        
        /*$data = Antecedente::with(['paciente','medico'])->get();
        $data = Antheredfamiliar::with(['paciente','medico'])->get();
        $data = Antpersonal::with(['paciente','medico'])->get();

        $data = Antgineco::with(['paciente','medico'])->get();
        $data = Antperinatal::with(['paciente','medico'])->get();*/

        return view('hclinica::antecedentes.create',compact('paciente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AntecedenteStoreRequest $request, $id)
    {
        $id = Crypt::decrypt($id);
        
        if(Antecedente::where('paciente_id', $id)->get()->count() > 0)
            return redirect('hclinica/create/'.Crypt::encrypt($id));

        //$request->tabaquismo;
        //$request1->cardiovascular!==null?implode(',', $request->cardiovascular):null;

        $paciente = Paciente::find($id);
        $birthday = explode('-', $paciente->fecha_nac);
        $edad = Carbon::createFromDate($birthday[0], $birthday[1], $birthday[2])->age;
        $medico = User::All();
        

        Antheredfamiliar::create([
                'cardiovascular' => $request->cardiovascular!==null?implode(',', $request->cardiovascular):'',
                'descripcion'   =>  $request->descripcion,
                'endocrino'     =>  $request->endocrino!==null?implode(',', $request->endocrino):'',
                'descripcion1'  =>  $request->descripcion1,
                'neurologico'   =>  $request->neurologico!==null?implode(',', $request->neurologico):'',
                'descripcion2'  =>  $request->descripcion2,
                'respiratorio'  =>  $request->respiratorio!==null?implode(',', $request->respiratorio):'',
                'descripcion3'  =>  $request->descripcion3,
                'neoplasico'    =>  $request->neoplasico!==null?implode(',', $request->neoplasico):'',
                'descripcion4'  =>  $request->descripcion4,
                'paciente_id'   =>  $paciente->id,
                'medico_id'     =>   Auth::user()->id
            ]);

        Antpersonal::create([
            'a'             => $request->a!==null?implode(',', $request->a):'',
            'quirurgicos'   => $request->quirurgicos,
            'transfusionales' => $request->transfusionales,
            'traumaticos'    => $request->traumaticos,
            'hospitalizaciones_previas' => $request->hospitalizaciones_previas,
            'descripcion'   => $request->descripcion,
            'tabaquismo'    => $request->tabaquismo,
            'alcohol'       => $request->alcohol,
            'drogas'        => $request->drogas,
            'inmunizaciones'    => $request->inmunizaciones,
            'descripcion1'      => $request->descripcion1,
            'descripcion2'      => $request->descripcion2,
            'descripcion3'      => $request->descripcion3,
            'enfermedad_infecciosa' =>$request->enfermedad_infecciosa!==null?implode(',',$request->enfermedad_infecciosa):'',
            'descripcion4'      => $request->descripcion4,
            'paciente_id' =>  $paciente->id,
            'medico_id' =>   Auth::user()->id
           
        ]);      
        
        if ($paciente->genero === 'Femenino' && $edad > 11 )
        {
             $this->validate($request,[
            'menarca'           => 'required|min:2|max:15',
            'telarca'           => 'required|min:2|max:15',
            'ritmo_menstrual'   => 'required',
            'dismenorrea'       => 'required',
            'fum'               => 'required',
            'parejas'           => 'required',
            'gesta'             => 'integer',
            'aborto'            => 'integer',
            'parto'             => 'integer',
            'cesarea'           => 'integer',
            'fup'               => 'required',
            'men_climaterio'    => 'required|min:3|max:30',    
            'metodo_planificacion'  => 'required',
            'descripcion'       => 'min:6|max:30',
            'pap'               => 'required',
            'descripcion1'      => 'min:3|max:15',
            'mamografia'        => 'required',
            ]);
                Antgineco::create([
                'menarca' =>$request->menarca,
                'telarca' =>$request->telarca,
                'ritmo_menstrual' =>$request->ritmo_menstrual,
                'dismenorrea' =>$request->dismenorrea,
                'fum'       =>  $request->fum,
                'parejas' => $request->parejas,
                'gesta' => $request->gesta,
                'aborto' => $request->aborto,
                'parto' => $request->parto,
                'cesarea' => $request->cesarea,
                'fup'       =>  $request->fup,
                'men_climaterio' => $request->men_climaterio,
                'metodo_planificacion' =>$request->metodo_planificacion,
                'descripcion'   =>$request->descripcion,
                'pap'           =>$request->pap,
                'descripcion1'   =>$request->descripcion1,
                'mamografia'    =>$request->mamografia,
                'paciente_id' =>  $paciente->id,
                'medico_id'  => Auth::user()->id
            ]);
        }



        if($edad <10)
        {
        $this->validate($request,[
            'numero_hijo'       => 'required|integer',
            'meses_gestacion'   => 'required|integer',
            'sitio_nac'         => 'required',        
            'descripcion'       => 'min:4|max:30',
            'tipo_nac'          => 'required',
            'peso'              => 'required',
            'talla'             => 'required',
            'problemas_nac'     => 'required',
            'especificacion'    => 'min:4|max:30',
            
            ]);
                Antperinatal::create([
                'numero_hijo' => $request->numero_hijo,
                'meses_gestacion' => $request->meses_gestacion,
                'sitio_nac' => $request->sitio_nac,
                'descripcion' =>  $request->descripcion,
                'tipo_nac'  => $request->tipo_nac,
                'talla'     => $request->talla,
                'peso'      => $request->peso,
                'problemas_nac' => $request->problemas_nac,
                'especificacion' => $request->especificacion,
                'paciente_id' =>  $paciente->id,
                'medico_id' =>  Auth::user()->id,
            ]);
        }

        Antecedente::create([
                'alergia'       =>$request->alergia,
                'grupo_sanguineo'=>$request->grupo_sanguineo,
                'rh'            =>$request->rh,         
                'paciente_id' =>  $paciente->id,
                'medico_id' =>   Auth::user()->id
        ]);


        return redirect('hclinica/create/'.Crypt::encrypt($paciente->id)); 
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
