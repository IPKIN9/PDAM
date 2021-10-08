<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\KaryawanRequest;
use App\Models\KaryawanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = array(
            'all' => KaryawanModel::all()
        );
        return view('Cms.Karyawan')->with('data', $data);
    }

    public function insert(KaryawanRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'nama' => $request->nama,
            'pangkat' => $request->pangkat,
            'jabatan' => $request->jabatan,
            'created_at' => $date,
            'updated_at' => $date,
        );
        try {
            KaryawanModel::create($data);
            return back()->with('status', 'Data berhasil ditambahkan');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function edit($id)
    {
        $result = KaryawanModel::where('id', $id)->first();
        return response()->json($result);
    }

    public function update(KaryawanRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'nama' => $request->nama,
            'pangkat' => $request->pangkat,
            'jabatan' => $request->jabatan,
            'updated_at' => $date,
        );
        try {
            KaryawanModel::where('id', $id)->update($data);
            return back()->with('status', 'Data berhasil diubah');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function delete($id)
    {
        KaryawanModel::where('id', $id)->delete();
        return response()->json();
    }
}
