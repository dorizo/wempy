<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            //
            'nomorinduk' => 'required|unique:members,nomorinduk',
            'email' => 'required|unique:members,email|unique:users,email',
            'telp' => 'required|unique:members,telp',
            'nama_lengkap' => 'required',
            'jabatan_jabatanCode' => 'required',
            'password' => 'required',
        ];
    }
}
