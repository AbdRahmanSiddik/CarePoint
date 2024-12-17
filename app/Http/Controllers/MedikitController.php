<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Medikit;
use App\Http\Requests\MedikitRequest;
use Illuminate\Support\Str;

class MedikitController extends Controller
{
    public function index()
    {
        $key = isset($_GET['key']) ? value($_GET['key']) : false ;

        if($key){
            $kategori = Kategori::where('token_kategori', $key)->first();
            $data = [
                'medikits' => Medikit::with('kategori')->where('kategori_id', $kategori->id_kategori)->get(),
                'key' => $kategori
            ];
        }else {
            $data = [
                'medikits' => Medikit::with('kategori')->get(),
            ];
        }

        return view('admin.medikit.data-medikit', $data);
    }

    public function create()
    {
        return view('admin.medikit.tambah-medikit');
    }

    public function store(MedikitRequest $request)
    {
        $token = Str::random(16);
        $kategori_id = $request->kategori;
        $nama_medikit = $request->nama_medikit;
        $file = $request->file('thumbnail');
        $deskripsi = $request->deskripsi;
        $harga = $request->harga;
        $stok = $request->stok;

        $file_name = $nama_medikit.".".$file->getClientOriginalExtension();

        Medikit::create([
            'token_medikit' => $token,
            'kategori_id' => $kategori_id,
            'nama_medikit' => $nama_medikit,
            'thumbnail' => $file_name,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'harga_jual' => $harga,
            'stok' => $stok,
        ]);
    }

    public function show(Medikit $medikit)
    {
        //
    }

    public function update(MedikitRequest $request, Medikit $medikit)
    {
        //
    }

    public function destroy(Medikit $medikit)
    {
        //
    }
}
