<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Buat roles
         Role::create(['name' => 'admin']);
         Role::create(['name' => 'user']);
 
         // Buat user pertama sebagai admin
         $admin = User::first();
         if ($admin) {
             $admin->assignRole('admin');
         }
    }
}
