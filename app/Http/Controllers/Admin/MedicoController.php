<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Admin\MedicoStoreRequest;
use App\Http\Requests\Admin\MedicoUpdateRequest;
use App\Http\Controllers\Controller;
use App\Modelos\Admin\Especialidad;

use App\People;
use App\User;
use Crypt;
class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responses
     */
    public function index()
    {
        
        $data = User::with(['people','especialidad'])->where('estado', '<>', 'eliminado')->where('type', 'medico')->get();

        return view('admin::medicos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$especialidad = Especialidad::where('estado' ,'<>', 'eliminado')->get();
        $data = Especialidad::where('estado', '<>', 'eliminado')->get();
        
        return view('admin::medicos.create', compact('data','especialidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicoStoreRequest $request)
    {
        $people = People::create([
                'name'  =>  $request->nombre,
                'firstname' => $request->apellidop,
                'lastname'  =>  $request->apellidom,
                'ci'        =>  $request->ci
            ]);

        User::create([
                'username'  =>  $request->username,
                'email' =>  $request->email,
                'type'  =>  'medico',
                'password'  =>  bcrypt($request->password),
                'estado'    =>  'habilitado',
                'people_id' =>  $people->id,
                'especialidad_id' => $request->especialidad
            ]);

        return redirect('admin/medicos');
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
        $data = User::with('people','especialidad')->find($id);
        return view('admin::medicos.show',compact('data'));
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
        $data = User::with('people')->find($id);

        return view('admin::medicos.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicoUpdateRequest $request, $id)
    {
        $id = Crypt::decrypt($id);
        $user = User::find($id);

        $people = People::find($user->people_id)->update([
                'name'  =>  $request->nombre,
                'firstname' => $request->apellidop,
                'lastname'  =>  $request->apellidom
            ]);

        $user->update([
                'estado'    =>  $request->estado
            ]);

        
        return redirect('admin/medicos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find(Crypt::decrypt($id))->update([
            'estado'    =>  'eliminado'
            ]);

        return redirect('admin\medicos');
    }
}
