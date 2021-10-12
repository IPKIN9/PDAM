<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengaduanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required',
            'no_telpon' => 'required',
            'kerusakan' => 'required',
            'keterangan' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'required' => 'Field ini tidak boleh kosong'
        ];
    }
}
