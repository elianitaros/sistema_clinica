<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProfileRequest;
use App\User;
use Auth;

class ProfileController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function profile()
    {
        $data = User::with('people')->find(Auth::user()->id);

        return view('admin::usuarios.perfil', compact('data'));
    }

    public function guardar(ProfileRequest $request)
    {
    	User::find(Auth::user()->id)->update(['password' => bcrypt($request->password)]);

        return redirect('/perfil')->with(['mensaje'=> 'su contraseña ha sido cambiada']);
    }
    public function reset($id)
    {
    	User::find($id)->update([
    		'password' => bcrypt('usuario')
    	]);
    	return redirect('admin/usuarios');
    }
}
