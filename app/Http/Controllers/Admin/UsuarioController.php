<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Admin\UsuarioStoreRequest;
use App\Http\Requests\Admin\UsuarioUpdateRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\People;
use Crypt;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::with('people')->where('estado', '<>', 'eliminado')->get();

        return view('admin::usuarios.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = User::where('estado', '<>', 'eliminado')->get();
        return view('admin::usuarios.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioStoreRequest $request)
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
                'type'  =>  $request->rol,
                'password'  =>  bcrypt($request->password),
                'estado'    =>  'habilitado',
                'people_id' =>  $people->id
            ]);

        return redirect('admin/usuarios');
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
        $data = User::with('people')->find($id);
        return view('admin::usuarios.show',compact('data'));
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

        return view('admin::usuarios.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioUpdateRequest $request, $id)
    {
        $user = User::find(Crypt::decrypt($id));

        $people = People::find($user->people_id)->update([
                'name'  =>  $request->nombre,
                'firstname' => $request->apellidop,
                'lastname'  =>  $request->apellidom
            ]);

        $user->update([
                'estado'    =>  $request->estado
            ]);

        
        return redirect('admin/usuarios');
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

        return redirect('admin\usuarios');
    }
}
