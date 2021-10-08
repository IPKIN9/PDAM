<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_karyawan' => 'required',
            'username' => 'required|min:5|max:10',
            'password' => 'required|min:5|max:10|confirmed',
        ];
    }
    public function messages()
    {
        return[
            'required' => 'Field ini tidak boleh kosong',
            'min' => 'Karater terlalu pendek',
            'max' => 'Karater terlalu panjang',
            'confirmed' => 'Password tidak sama'
        ];
    }
}
