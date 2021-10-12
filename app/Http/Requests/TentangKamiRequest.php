<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TentangKamiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'des' => 'required',
            'alamat' => 'required',
            'wa' => 'required|numeric',
            'hp' => 'required|numeric',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong',
            'numeric' => 'Tipe data tidak valid',
            'email' => 'Email tidak valid'
        ];
    }
}
