<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembayaranRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_pelanggan' => 'required',
            'id_pemakaian' => 'required',
            'adm' => 'required|numeric',
            'ppa' => 'required|numeric',
            'denda' => 'required|numeric',
            'total' => 'required|numeric',
            'periode' => 'required',
            'tgl_pembayaran' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong',
            'numeric' => 'Tipe data tidak didukung',
            'date' => 'Tipe data tidak didukung',
        ];
    }
}
