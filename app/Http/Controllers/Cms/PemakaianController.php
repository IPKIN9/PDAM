<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\PemakaianRequest;
use App\Models\PelangganModel;
use App\Models\PemakaianModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class PemakaianController extends Controller
{
    public function index()
    {
        $data = array(
            'all' =>PemakaianModel::all(),
            'user' => User::all(),
            'pelngn' => PelangganModel::all()
        );
        return view('Cms.Pemakaian')->with('data', $data);
    }

    public function insert(PemakaianRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'id_user' => $request->id_user,
            'id_pelanggan' => $request->id_pelanggan,
            'kode_pemakaian' => $request->kode_pemakaian,
            'jumlah_pemakaian' => $request->jumlah_pemakaian,
            'created_at' => $date,
            'updated_at' => $date,
        );
        try {
           PemakaianModel::create($data);
            return back()->with('status', 'Data berhasil ditambahkan');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function edit($id)
    {
        $result =PemakaianModel::where('id', $id)->first();
        return response()->json($result);
    }

    public function update(PemakaianRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'id_user' => $request->id_user,
            'id_pelanggan' => $request->id_pelanggan,
            'kode_pemakaian' => $request->kode_pemakaian,
            'jumlah_pemakaian' => $request->jumlah_pemakaian,
            'updated_at' => $date,
        );
        try {
           PemakaianModel::where('id', $id)->update($data);
            return back()->with('status', 'Data berhasil diubah');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function delete($id)
    {
       PemakaianModel::where('id', $id)->delete();
        return response()->json();
    }
}
