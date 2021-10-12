<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\TentangKamiRequest;
use App\Models\TentangKamiModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use stdClass;

class TentangKamiController extends Controller
{
    public function index()
    {
        $count = TentangKamiModel::all()->count();
        if ($count > 0) {
            $data = TentangKamiModel::all()->first();
        } else {
            $data = null;
        }
        return view('Cms.TentangKami')->with('data', $data);
    }

    public function create(TentangKamiRequest $request)
    {
        $date = Carbon::now();
        $id = $request->id;
        $data = array(
            'des' => $request->des,
            'alamat' => $request->alamat,
            'wa' => $request->wa,
            'hp' => $request->hp,
            'email' => $request->email,
            'created_at' => $date,
            'updated_at' => $date,
        );
        if ($id == null) {
            TentangKamiModel::create($data);
        } else {
            $data2 = array(
                'des' => $request->des,
                'alamat' => $request->alamat,
                'wa' => $request->wa,
                'hp' => $request->hp,
                'email' => $request->email,
                'updated_at' => $date,
            );
            TentangKamiModel::where('id', $id)->update($data2);
        }
        return back()->with('status', 'Data berhasil di update');
    }
}
