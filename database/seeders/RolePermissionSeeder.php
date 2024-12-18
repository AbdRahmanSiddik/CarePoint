<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'tambah-kategori']);
        Permission::create(['name' => 'edit-kategori']);
        Permission::create(['name' => 'hapus-kategori']);
        Permission::create(['name' => 'lihat-kategori']);

        Permission::create(['name' => 'tambah-supplier']);
        Permission::create(['name' => 'edit-supplier']);
        Permission::create(['name' => 'hapus-supplier']);
        Permission::create(['name' => 'lihat-supplier']);

        Permission::create(['name' => 'tambah-medikit']);
        Permission::create(['name' => 'edit-medikit']);
        Permission::create(['name' => 'hapus-medikit']);
        Permission::create(['name' => 'lihat-medikit']);

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'operator']);
        Role::create(['name'=>'karyawan']);

        $roleAdmin = Role::findByName('admin');
        $permissions = Permission::all();
        $roleAdmin->givePermissionTo($permissions);

        $roleOperator = Role::findByName('operator');
        $roleOperator->givePermissionTo([
            'tambah-kategori',
            'edit-kategori',
            'hapus-kategori',
            'lihat-kategori',
            'tambah-supplier',
            'edit-supplier',
            'hapus-supplier',
            'lihat-supplier',
            'tambah-medikit',
            'edit-medikit',
            'hapus-medikit',
            'lihat-medikit',
        ]);
    }
}
