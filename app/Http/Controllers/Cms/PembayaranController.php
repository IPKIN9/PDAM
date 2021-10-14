<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\PembayaranRequest;
use App\Models\PelangganModel;
use App\Models\PemakaianModel;
use App\Models\PembayaranModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use PDF;

class PembayaranController extends Controller
{
    public function index()
    {
        $data = array(
            'pelanggan' => PelangganModel::all(),
            'pembayaran' => PembayaranModel::all()
        );
        return view('Cms.Pembayaran')->with('data', $data);
    }

    public function status(Request $request, $id)
    {
        $id_pelanggan = $request->pelanggan;
        $periode = $request->periode;
        $detail_golongan = PelangganModel::where('id', $id_pelanggan)->with('detail_role')->first();
        $pemakaian = PemakaianModel::where(
            [
                ['id_pelanggan', $id_pelanggan],
                ['periode', $periode]
            ]
        )->first();


        $count = PembayaranModel::all()->count('id');
        $bayar = PembayaranModel::where(
            [
                ['id_pelanggan', $id_pelanggan],
                ['periode', $periode]
            ]
        )->value('telah_dibayar');

        if ($pemakaian == null) {
            return response()->json("null");
        } else {
            if ($count > 0) {
                $result = array(
                    'status' => $bayar
                );
                return response()->json($result);
            } else {

                if ($pemakaian->jumlah_pemakaian <= 10) {
                    $tarif = $detail_golongan->detail_role->blok_1;
                    $hasil = $tarif * 10;
                    $result = array(
                        'status' => $bayar,
                        'pemakaian' => $pemakaian,
                        'tarif' => $hasil,
                        'adm' => $detail_golongan->detail_role->biaya_beban,
                    );
                    // $result = $hasil;
                } elseif ($pemakaian->jumlah_pemakaian > 10) {
                    $tarif = $detail_golongan->detail_role->blok_1;
                    $tarif2 = $detail_golongan->detail_role->blok_2;
                    $a = $tarif * 10;
                    $b = $tarif2 * 11;
                    $hasil = $a + $b;
                    $result = array(
                        'status' => $bayar,
                        'pemakaian' => $pemakaian,
                        'tarif' => $hasil,
                        'adm' => $detail_golongan->detail_role->biaya_beban,
                    );
                    // $result = $hasil;
                }
                return response()->json($result);
            }
        }
    }

    public function create(PembayaranRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'id_pemakaian' => $request->id_pemakaian,
            'id_pelanggan' => $request->id_pelanggan,
            'periode' => $request->periode,
            'telah_dibayar' => 1,
            'ppa' => $request->ppa,
            'denda' => $request->denda,
            'adm' => $request->adm,
            'tarif_air' => $request->tarif_air,
            'tgl_pembayaran' => $request->tgl_pembayaran,
            'total' => $request->total,
            'created_at' => $date,
            'updated_at' => $date,
        );

        PembayaranModel::create($data);
        return redirect()->back()->with('status', 'Pembayaran berhasil dilakukan');
    }

    public function cetak($id)
    {
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });
        $data = PembayaranModel::where('id', $id)->with('pelanggan_role', 'pemakaian_role')->first();
        // return view('Paper.Struck')->with('data', $data);
        $pdf = PDF::loadView('Paper.Struck', ['data' => $data])->setPaper('A4', 'landscape');;
        return $pdf->download('invoice.pdf');
    }
}
