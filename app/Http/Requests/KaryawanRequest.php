<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaryawanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong',
        ];
    }
}
