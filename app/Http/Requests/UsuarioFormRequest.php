<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class UsuarioFormRequest extends Request
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
            'name' => 'required|max:255',
            //'email' => 'required|email|max:255|unique:usersid',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'El nombre de usuario es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'password.min' => 'La contraseña debe tener mínimo 6 caracteres'
        ];
    }

    // public function attributes()
    // {
    //     return [
    //         'name' => 'nombre de usuario',
    //         'email' => 'correo electrónico',
    //         'contraseña' => 'contraseña'
    //     ];
    // }
}
