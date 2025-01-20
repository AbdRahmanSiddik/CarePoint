<?php

namespace App\Http\Controllers;

use App\Mail\SendPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class KaryawanController extends Controller
{
    public function index()
    {

        $roles = Role::where('name', '!=', 'admin')->get();
        $karyawans = User::role(['karyawan', 'operator'])->get();
        return view('admin.karyawan.karyawan-view', compact('karyawans', 'roles'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $password = 'carepoint'.Str::random(4);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password),
        ];

        $karyawan = User::create($data);
        $karyawan->assignRole($request->role);

        Mail::to($request->email)->send(new SendPassword($password));

        return redirect('/karyawan')->with('store', 'Berhasil menambha karyawan');

    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, User $karyawan)
    {
        // $password = 'carepoint'.Str::random(4);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => bcrypt($password),
        ];

        $karyawan->update($data);
        $karyawan->assignRole($request->role);

        // Mail::to($request->email)->send(new SendPassword($password));

        return redirect('/karyawan')->with('update', 'Berhasil menambha karyawan');
    }

    public function destroy(User $karyawan)
    {
        $karyawan->delete();
        return redirect('/karyawan')->with('destroy', 'Berhasil menambha karyawan');
    }
}
