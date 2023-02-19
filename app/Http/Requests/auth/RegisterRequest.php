<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => 'required|string',
            'nohp' => 'required|string',
            'email' => 'required|string|unique:members|min:3',
            'ktp' => 'required|string',
            'foto' => 'required|mimes:jpg,jpeg,png',
            'alamat' => 'required|string',
            'username' => 'required|string|unique:users|min:3',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ];
    }
}
