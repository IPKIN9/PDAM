<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\PengaduanRequest;
use App\Models\BangunanModel;
use App\Models\GolonganModel;
use App\Models\PelangganModel;
use App\Models\TentangKamiModel;
use App\Http\Requests\PermintaanRequest;
use App\Models\DetailGolonganModel;
use App\Models\PemakaianModel;
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
            return redirect('/#regist')->with('status_permintaan', $pesan);
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
            return redirect('/#contact-trd')->with('status_pengaduan', $pesan);
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function check(Request $request)
    {
        $date = Carbon::now()->isoFormat('MMMM-Y');
        $bangunan = BangunanModel::where('kode_bangunan', $request->kode)->value('id');
        $pelanggan = PelangganModel::where([
            ['nama', $request->nama],
            ['id_bangunan', $bangunan]
        ])->with('detail_role')->first();

        if ($pelanggan == null) {
            $result = "Tidak ditemukan";
        } else {
            $pemakaian = PemakaianModel::where([
                ['id_pelanggan', $pelanggan->id],
                ['periode', $date]
            ])->first();
            if ($pemakaian == null) {
                $result = "null";
            } else {
                $detail = DetailGolonganModel::where('id', $pelanggan->id_detail_golongan)->first();
                if ($pemakaian->jumlah_pemakaian <= 10) {
                    $beban = $detail->biaya_beban;
                    $blok1 = $detail->blok_1;
                    $tarif = $blok1 * 10;
                    $total = $tarif + $beban;

                    $result = $total;
                }
                if ($pemakaian->jumlah_pemakaian > 10) {
                    $beban = $detail->biaya_beban;
                    $blok1 = $detail->blok_1;
                    $blok2 = $detail->blok_2;
                    $tarif1 = $blok1 * 10;
                    $tarif2 = $blok2 * 11;
                    $total = $tarif1 + $tarif2 + $beban;

                    $result = $total;
                }
            }
        }

        return response()->json($result);
    }
}
