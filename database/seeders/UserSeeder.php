<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        $data = array(
            'name' => 'Super Admin',
            'username' => 'request_superadmin',
            'password' => Hash::make('request_pass'),
            'role' => 'super_admin'
        );
        $admin = User::create($data);
        $admin->assignRole('super_admin');
        $data2 = array(
            'name' => 'Admin',
            'username' => 'request_admin',
            'password' => Hash::make('request_pass'),
            'role' => 'admin'
        );
        $admin2 = User::create($data2);
        $admin2->assignRole('admin');
        $data3 = array(
            'name' => 'Petugas',
            'username' => 'request_petugas',
            'password' => Hash::make('request_pass'),
            'role' => 'petugas'
        );
        $admin3 = User::create($data3);
        $admin3->assignRole('petugas');
    }
}
