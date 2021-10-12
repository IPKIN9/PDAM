<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BangunanModel;
use App\Models\GolonganModel;
use App\Models\PelangganModel;
use App\Models\TentangKamiModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = array(
            'tentang' => TentangKamiModel::all()->first(),
            'c_bangunan' => BangunanModel::all()->count('kode_bangunan'),
            'c_pelanggan' => PelangganModel::all()->count('nama')
        );
        return view('Web.Home')->with('data', $data);
    }

    public function tagihan()
    {
    }

    public function permintaan()
    {
    }

    public function pengaduan()
    {
    }
}
