<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\PengaduanModel;
use App\Models\PermintaanModel;
use Illuminate\Http\Request;

class HomesController extends Controller
{
    public function permintaanindex()
    {
        $data = array(
            'all' => PermintaanModel::all()
        );
        return view('Web.Permintaan')->with('data', $data);
    }
    public function deletepermintaan($id)
    {
        PermintaanModel::where('id', $id)->delete();
        return response()->json();
    }
    public function pengaduanindex()
    {
        $data = array(
            'all' => PengaduanModel::all()
        );
        return view('Web.Pengaduan')->with('data', $data);
    }
    public function deletepengaduan($id)
    {
        PengaduanModel::where('id', $id)->delete();
        return response()->json();
    }
}
