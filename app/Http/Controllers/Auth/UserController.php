<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\KaryawanModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class UserController extends Controller
{
    public function index()
    {
        // $data = array(
        //     'all' => User::all(),
        // );
        $data = User::where('id', '!=', auth()->id())->get();
        return view('Auth.User')->with('data', $data);
    }

    public function insert(UserRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'created_at' => $date,
            'updated_at' => $date,
        );
        try {
            $admin = User::create($data);
            $admin->assignRole($request->role);
            return back()->with('status', 'Data berhasil ditambahkan');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function edit($id)
    {
        $result = User::where('id', $id)->first();
        return response()->json($result);
    }

    public function update(UserRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'name' => $request->username,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'updated_at' => $date,
        );
        try {
            User::where('id', $id)->update($data);
            return back()->with('status', 'Data berhasil diubah');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return response()->json();
    }
}
