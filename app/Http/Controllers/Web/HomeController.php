<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermintaanRequest;
use App\Models\PermintaanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class HomeController extends Controller
{
    public function index()
    {
        $data=[
            'permintaan' => PermintaanModel::all(),
        ];
        return view('Web.Home')->with('data',$data);
    }

    public function tagihan()
    {
    }

    public function permintaan(PermintaanRequest $request)
    {
        $date = Carbon::now();
        $random = random_int(10000,99999);
        $data = array(
            'kode_booking' => $random,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'created_at' => $date,
            'updated_at' => $date,
        );
        $pesan='Terima kasih telah melakukan permintaan pemasangan, nomor tiket anda: '. $random;
        try {
           PermintaanModel::create($data);
           return redirect('/#regist')->with('status', $pesan);
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function pengaduan()
    {
    }
}
