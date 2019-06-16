<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => [
                'required',
                'max:50'
            ],
            'email' => [
                'required',
                'max:50',
                'unique:users,email,'
                    . ($this->user ? $this->user->id : null)
            ],
            'password' => [
                'required',
                'max:50'
            ]
        ];
    }

    public function messages() {
        return [
            'name.required' => 'El nombre es obligatorio',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.unique' => 'Ese correo electrónico ya está en uso',
            'password.required' => 'La contraseña es obligatoria'
        ];
    }
}
