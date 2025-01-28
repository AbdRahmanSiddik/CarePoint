<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => '_admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('@Admin123'),
        ]);
        $admin->assignRole('admin');

        $operator = User::create([
            'name' => '_operator',
            'email' => 'operator@gmail.com',
            'password' => bcrypt('@Operator123'),
        ]);
        $operator->assignRole('operator');

        $karyawan = User::create([
            'name' => '_karyawan',
            'email' => 'karyawan@gmail.com',
            'password' => bcrypt('@Karyawan123'),
        ]);
        $karyawan->assignRole('karyawan');
    }
}
