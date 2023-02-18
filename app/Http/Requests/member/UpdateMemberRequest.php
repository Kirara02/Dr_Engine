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
            'nohp' => 'required|string',
            'email' => 'required|string|min:3|unique:members,email,'.$this->member->id,
            'ktp' => 'required|string',
            'foto' => 'mimes:jpg,jpeg,png',
            'alamat' => 'required|string',
            'username' => 'required|string|min:3|unique:users,username,'. $this->member->user->id,
            // 'password' => 'required|string|min:6',
            'level' => 'required|string'
        ];
    }
}
