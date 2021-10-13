<?php

namespace Database\Seeders;

use App\Models\DetailGolonganModel;
use App\Models\GolonganModel;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $random = Str::random(10);
        $data = array(
            'golongan' => "Tipikal Air Banyak",
            'kode_golongan' => $random,
            'unit' => "Unit A",
            'created_at' => $date,
            'updated_at' => $date,
        );
        GolonganModel::create($data);
        $kode = GolonganModel::where('kode_golongan', $random)->value('id');
        $data2 = array(
            'id_golongan' => $kode,
            'sub_golongan' => "Banyak Air",
            'blok_1' => 1000,
            'blok_2' => 2000,
            'biaya_beban' => 1000,
            'created_at' => $date,
            'updated_at' => $date,
        );
        DetailGolonganModel::create($data2);
        $data3 = array(
            'id_golongan' => $kode,
            'sub_golongan' => "Sangat Banyak",
            'blok_1' => 1500,
            'blok_2' => 2500,
            'biaya_beban' => 1000,
            'created_at' => $date,
            'updated_at' => $date,
        );
        DetailGolonganModel::create($data3);
    }
}
