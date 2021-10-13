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
            'sub_golongan' => 'required',
            'blok_1' => 'required',
            'blok_2' => 'required',
            'biaya_beban' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong',
            'numeric' => 'Type data tidak valid'
        ];
    }
}
