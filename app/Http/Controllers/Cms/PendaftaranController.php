<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\PendaftaranRequest;
use App\Models\BangunanModel;
use App\Models\DetailGolonganModel;
use App\Models\GolonganModel;
use App\Models\PelangganModel;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Throwable;

class PendaftaranController extends Controller
{
    public function index()
    {
        $data = array(
            'pelanggan' => PelangganModel::all(),
            'golongan' => GolonganModel::all()
        );
        return view('Cms.Pendaftaran')->with('data', $data);
    }

    public function detail($id)
    {
        $result = DetailGolonganModel::where('id_golongan', $id)->get();
        return response()->json($result);
    }

    public function create(PendaftaranRequest $request)
    {
        $date = Carbon::now();
        $random = Str::random(15);
        $pmj = $request->pmj;
        if ($pmj == "true") {
            $data = array(
                'kode_bangunan' => $random,
                'no_sambungan' => $request->no_sambungan,
                'luas_tanah' => $request->luas_tanah,
                'jenis_bangunan' => $request->jenis_bangunan,
                'status_bangunan' => $request->status_bangunan,
                'perumahan_sambungan' => $request->perumahan_sambungan,
                'sumber_air' => $request->sumber_air,
                'pmj' => $request->pmj,
                'nama_sebelumnya' => $request->nama_sebelumnya,
                'no_sebelumnya' => $request->no_sebelumnya,
                'created_at' => $date,
                'updated_at' => $date,
            );
        } else {
            $data = array(
                'kode_bangunan' => $random,
                'no_sambungan' => $request->no_sambungan,
                'luas_tanah' => $request->luas_tanah,
                'jenis_bangunan' => $request->jenis_bangunan,
                'status_bangunan' => $request->status_bangunan,
                'perumahan_sambungan' => $request->perumahan_sambungan,
                'sumber_air' => $request->sumber_air,
                'pmj' => $request->pmj,
                'nama_sebelumnya' => null,
                'no_sebelumnya' => null,
                'created_at' => $date,
                'updated_at' => $date,
            );
        }
        try {
            BangunanModel::create($data);
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }

        $id_bangunan = BangunanModel::where('kode_bangunan', $random)->value('id');
        $data2 = array(
            'id_golongan' => $request->id_golongan,
            'id_detail_golongan' => $request->id_detail_golongan,
            'id_bangunan' => $id_bangunan,
            'status' => "baru",
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'rt_rw' => $request->rt_rw,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'no_pendaftaran' => $request->no_pendaftaran,
            'alamat_sambungan' => $request->alamat_sambungan,
            'jumlah_penghuni' => $request->jumlah_penghuni,
            'created_at' => $date,
            'updated_at' => $date,
        );
        try {

            PelangganModel::create($data2);
            return back()->with('status', 'Data berhasil ditambahkan');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function detail_edit($id)
    {
        $pelanggan = PelangganModel::where('id', $id)->with('bangunan_role')->first();
        $data = array(
            'pelanggan' => $pelanggan,
            'detail_golongan' => DetailGolonganModel::where('id_golongan', $pelanggan->id_golongan)->get(),
        );

        return response()->json($data);
    }

    public function update(PendaftaranRequest $request)
    {
        $id_pelanggan = $request->id_pelanggan;
        $id_bangunan = $request->id_bangunan;
        $id_golongan = $request->id_golongan;
        $id_detail_golongan = $request->id_detail_golongan;
        $date = Carbon::now();
        $data = array(
            'no_sambungan' => $request->no_sambungan,
            'luas_tanah' => $request->luas_tanah,
            'jenis_bangunan' => $request->jenis_bangunan,
            'status_bangunan' => $request->status_bangunan,
            'perumahan_sambungan' => $request->perumahan_sambungan,
            'sumber_air' => $request->sumber_air,
            'updated_at' => $date,
        );
        BangunanModel::where('id', $id_bangunan)->update($data);

        $data2 = array(
            'id_golongan' => $id_golongan,
            'id_detail_golongan' => $id_detail_golongan,
            'id_bangunan' => $id_bangunan,
            'status' => "baru",
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'rt_rw' => $request->rt_rw,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'no_pendaftaran' => $request->no_pendaftaran,
            'alamat_sambungan' => $request->alamat_sambungan,
            'jumlah_penghuni' => $request->jumlah_penghuni,
            'updated_at' => $date,
        );
        PelangganModel::where('id', $id_pelanggan)->update($data2);
        return back()->with('status', 'Data berhasil diperbaharui');
    }

    public function delete($id)
    {
        $where = PelangganModel::where('id', $id)->value('id_bangunan');
        PelangganModel::where('id', $id)->delete();
        BangunanModel::where('id', $where)->delete();
        return response()->json();
    }
}
