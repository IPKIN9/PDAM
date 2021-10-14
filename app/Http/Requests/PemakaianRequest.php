<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemakaianRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_pelanggan' => 'required',
            'kode_pemakaian' => 'required',
            'jumlah_pemakaian' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong'
        ];
    }
}
