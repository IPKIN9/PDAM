<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GolonganRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'golongan' => 'required',
            'unit' => 'required',
            'blok_konsumsi' => 'required',
            'sub_golongan' => 'required',
            'tarif_air' => 'required',
            'biaya_beban' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong'
        ];
    }
}
