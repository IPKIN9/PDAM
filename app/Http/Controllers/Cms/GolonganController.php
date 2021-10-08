<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\GolonganRequest;
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
        $random = Str::random(5);
        $data = array(
            'golongan' => $request->golongan,
            'unit' => $request->unit,
            'blok_konsumsi' => $request->blok_konsumsi
        );
    }

    public function detail($id)
    {
    }

    public function update(GolonganRequest $request)
    {
    }

    public function delete($id)
    {
    }
}
