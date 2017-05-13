<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class UsuarioStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:3|max:150',
            'apellidop' => 'max:75',
            'apellidom' => 'max:75',
            'username'  =>  'required|unique:users|min:6|max:25',
            'email'     =>  'required|unique:users|max:100',
            'password'  =>  'required|min:8|max:50|confirmed',
            'password_confirmation' => 'required|min:8|max:50'
        ];
    }
}
