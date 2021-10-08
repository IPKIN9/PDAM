<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {
        return view('Cms.Golongan');
    }
}
