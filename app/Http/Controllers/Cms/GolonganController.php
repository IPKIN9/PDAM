<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\GolonganModel;
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
}
