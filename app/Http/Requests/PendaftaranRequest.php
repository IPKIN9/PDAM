<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required',
            'alamat' => 'required',
            'rt_rw' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'no_pendaftaran' => 'required',
            'alamat_sambungan' => 'required',
            'jumlah_penghuni' => 'required|integer',
            'id_golongan' => 'required',
            'id_detail_golongan' => 'required',
            'no_sambungan' => 'required',
            'luas_tanah' => 'required|integer',
            'jenis_bangunan' => 'required',
            'status_bangunan' => 'required',
            'perumahan_sambungan' => 'required',
            'sumber_air' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong',
            'integer' => 'Tipe data tidak didukung',
        ];
    }
}
