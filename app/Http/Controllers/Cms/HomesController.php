<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
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
}
