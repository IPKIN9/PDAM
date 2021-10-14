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
    }
}
