<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'odeandialamsyah@gmail.com',
            'password' => Hash::make('13210911'),
            'admin' => true,
        ]);

        // Buat user biasa
        User::create([
            'name' => 'Sindi',
            'email' => 'Sindi1232gmail.com',
            'password' => Hash::make('password'),
            'admin' => false,
        ]);
    }
}
