<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Admin\EspecialidadStoreRequest;
use App\Http\Requests\Admin\EspecialidadUpdateRequest;
use App\Http\Controllers\Controller;
use App\Modelos\Admin\Especialidad;
use Faker;
use Crypt;
class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Especialidad::where('estado', '<>', 'eliminado')->get();

        return view('admin::especialidades.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Especialidad::where('estado', '<>', 'eliminado')->get();
        return view('admin::especialidades.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecialidadStoreRequest $request)
    {
        $faker = Faker\Factory::create();

        $data = Especialidad::create([
                'nombre' => $request->nombre,
                'color' => $faker->hexcolor
            ]);
        return redirect('admin/especialidades');
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
        $data = Especialidad::find($id);

        return view('admin::especialidades.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EspecialidadUpdateRequest $request, $id)
    {
        $especialidad = Especialidad::find(Crypt::decrypt($id));
        $especialidad->update([
                'nombre'    =>  $request->nombre,
                'estado'    =>  $request->estado,
            ]);

        
        return redirect('admin/especialidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Especialidad::find(Crypt::decrypt($id))->update([
            'estado'    =>  'eliminado'
            ]);

        return redirect('admin\especialidades');
    }
}
