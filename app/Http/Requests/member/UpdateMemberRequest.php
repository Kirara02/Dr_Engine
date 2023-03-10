<?php

namespace App\Http\Requests\member;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            'nohp' => 'required|numeric',
            'email' => 'required|email|min:3|unique:members,email,'.$this->member->id,
            'nik' => 'required|numeric',
            'ktp' => 'mimes:jpg,jpeg,png',
            'foto' => 'mimes:jpg,jpeg,png',
            'alamat' => 'required|string',
            'username' => 'required|string|min:3|unique:users,username,'. $this->member->user->id,
            // 'password' => 'required|string|min:6',
            'level' => 'required|string'
        ];
    }
}
