<?php

namespace Database\Seeders;

use App\Models\BangunanModel;
use App\Models\PelangganModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        $random = Str::random(15);
        $date = Carbon::now();
        $data = array(
            'kode_bangunan' => $random,
            'no_sambungan' => "b-12053",
            'luas_tanah' => 12,
            'jenis_bangunan' => "2 Lantai",
            'status_bangunan' => 'jomblo',
            'perumahan_sambungan' => 'x-315',
            'sumber_air' => 'pipa',
            'pmj' => false,
            'created_at' => $date,
            'updated_at' => $date,
        );
        BangunanModel::create($data);
        $id_bangunan = BangunanModel::where('kode_bangunan', $random)->value('id');

        $data2 = array(
            'id_bangunan' => $id_bangunan,
            'id_golongan' => 1,
            'id_detail_golongan' => 1,
            'status' => "Baru",
            'nama' => "Etangled",
            'alamat' => 'Jl. Asam 1',
            'rt_rw' => "006/005",
            'kecamatan' => 'Palu Barat',
            'kabupaten' => 'Palu',
            'no_pendaftaran' => '12p-2021',
            'alamat_sambungan' => 'Rumah Sebelah',
            'jumlah_penghuni' => 2,
            'created_at' => $date,
            'updated_at' => $date,
        );
        PelangganModel::create($data2);
    }
}
