<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\PengaduanRequest;
use App\Models\BangunanModel;
use App\Models\GolonganModel;
use App\Models\PelangganModel;
use App\Models\TentangKamiModel;
use App\Http\Requests\PermintaanRequest;
use App\Models\PengaduanModel;
use App\Models\PermintaanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

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
        $data = [
            'permintaan' => PermintaanModel::all(),
        ];
        return view('Web.Home')->with('data', $data);
    }

    public function tagihan()
    {
    }

    public function permintaan(PermintaanRequest $request)
    {
        $date = Carbon::now();
        $random = random_int(10000, 99999);
        $data = array(
            'kode_booking' => $random,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'created_at' => $date,
            'updated_at' => $date,
        );
        $pesan = 'Terima kasih telah melakukan permintaan pemasangan, nomor tiket anda: ' . $random;
        try {
            PermintaanModel::create($data);
            return redirect('/#regist')->with('status', $pesan);
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function pengaduan(PengaduanRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'nama' => $request->nama,
            'no_telpon' => $request->no_telpon,
            'kerusakan' => $request->kerusakan,
            'keterangan' => $request->keterangan,
            'created_at' => $date,
            'updated_at' => $date,
        );
        $pesan = 'Terima kasih telah menghubungi kami, Pengaduan anda akan kami tindak lanjuti dalam 1 x 24 jam.';
        try {
            PengaduanModel::create($data);
            return redirect('/#contact-trd')->with('status', $pesan);
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }
}
