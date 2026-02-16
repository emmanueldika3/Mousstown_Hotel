<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'       => 'Admin Mousstown',
            'first_name' => 'Admin', // Selon tes champs fillable
            'prenom'     => 'Mousstown',
            'email'      => 'admin@mousstown.com',
            'phone'      => '237600000000',
            'password'   => Hash::make('admin'), // Le mot de passe sera : password123
            'role'       => 'admin', // Très important pour ton isAdmin()
        ]);
    }
}
