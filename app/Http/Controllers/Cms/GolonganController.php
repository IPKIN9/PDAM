<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\GolonganRequest;
use App\Models\DetailGolonganModel;
use App\Models\GolonganModel;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {
        $data = array(
            'golongan' => GolonganModel::all()
        );
        return view('Cms.Golongan')->with('data', $data);
    }

    public function create(GolonganRequest $request)
    {
        $date = Carbon::now();
        $random = Str::random(10);
        $confir = $request->confir;
        if ($confir == "true") {
            $data = array(
                'golongan' => $request->golongan,
                'kode_golongan' => $random,
                'unit' => $request->unit,
                'blok_konsumsi' => $request->blok_konsumsi,
                'created_at' => $date,
                'updated_at' => $date,
            );
            GolonganModel::create($data);
            $kode = GolonganModel::where('kode_golongan', $random)->value('id');
            $data2 = array(
                'id_golongan' => $kode,
                'sub_golongan' => $request->sub_golongan,
                'tarif_air' => $request->tarif_air,
                'biaya_beban' => $request->biaya_beban,
                'created_at' => $date,
                'updated_at' => $date,
            );
            DetailGolonganModel::create($data2);
            return back()->with('status', 'Data baru berhasil ditambahkan');
        } else {
            $data = array(
                'id_golongan' => $request->golongan,
                'sub_golongan' => $request->sub_golongan,
                'tarif_air' => $request->tarif_air,
                'biaya_beban' => $request->biaya_beban,
                'created_at' => $date,
                'updated_at' => $date,
            );
            DetailGolonganModel::create($data);
            return back()->with('status', 'Data berhasil ditambahkan');
        }
    }

    public function detail($id)
    {
        $data = array(
            'golongan' => GolonganModel::where('id', $id)->first(),
            'detail' => DetailGolonganModel::where('id_golongan', $id)->get()
        );
        return response()->json($data);
    }

    public function update(GolonganRequest $request)
    {
        $date = Carbon::now();
        $id_golongan = $request->id;
        $data = array(
            'golongan' => $request->golongan,
            'unit' => $request->unit,
            'blok_konsumsi' => $request->blok_konsumsi,
            'updated_at' => $date,
        );
        GolonganModel::where('id', $id_golongan)->update($data);
        $allData = $request->all();
        foreach ($allData['id-detail'] as $d => $value) {
            $id_detail = $request['id-detail'][$d];
            $data2 = array(
                'sub_golongan' => $request['sub_golongan'][$d],
                'tarif_air' => $request['tarif_air'][$d],
                'biaya_beban' => $request['biaya_beban'][$d],
                'updated_at' => $date,
            );
            DetailGolonganModel::where('id', $id_detail)->update($data2);
        }
        return back()->with('status', 'Data berhasil diperbaharui');
    }

    public function destroy($id)
    {
        DetailGolonganModel::where('id', $id)->delete();
        return response()->json();
    }

    public function delete($id)
    {
        DetailGolonganModel::where('id_golongan', $id)->delete();
        GolonganModel::where('id', $id)->delete();
        return response()->json();
    }
}
