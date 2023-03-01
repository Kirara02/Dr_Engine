<?php

namespace App\Http\Requests\member;

use Illuminate\Foundation\Http\FormRequest;

class CreateMemberRequest extends FormRequest
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
            'nik' => 'required|string',
            'ktp' => 'required|mimes:jpg,jpeg,png',
            'foto' => 'required|mimes:jpg,jpeg,png',
            'alamat' => 'required|string',
            'username' => 'required|string|unique:users|min:3',
            'password' => 'required|string|min:6',
            'level' => 'required|string'
        ];
    }
}
