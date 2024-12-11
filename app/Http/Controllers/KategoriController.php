<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\KategoriRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $data = [
            'kategoris' => Kategori::withCount('medikit')->get()
        ];

        return view('admin.kategori.data-kategori', $data);
    }

    public function store(KategoriRequest $request)
    {
        $token = Str::random(16);
        $nama_kategori = $request->kategori;

        $data = [
            'token_kategori' => $token,
            'nama_kategori' => $nama_kategori,
        ];

        $kategoriId = Kategori::insertGetId($data);

        $kategori = Kategori::where('id_kategori', $kategoriId)->withCount('medikit')->first();

        // Cek jika request adalah AJAX
        if ($request->ajax()) {
            return response()->json([
                'message' => "Data $nama_kategori Berhasil Dimasukkan",
                'data' => $kategori
            ]);
        }

        return redirect('/kategori')->with([
            'store' => "Data $nama_kategori Berhasil Dimasukkan"
        ]);
    }

    public function update(KategoriRequest $request, Kategori $kategori)
    {
        $token = Str::random(16);
        $nama_kategori = $request->kategori;

        $data = [
            'token_kategori' => $token,
            'nama_kategori' => $nama_kategori,
        ];

        $old_kategori = $kategori->nama_kategori;
        $kategori->update($data);

        return redirect('/kategori')->with([
            'update' => "Data $nama_kategori --> $old_kategori Berhasil Diupdate"
        ]);
    }

    public function destroy(Kategori $kategori)
    {
        $cek = $kategori->medikit()->count();

        if($cek == 0){
            $kategori->delete();
            return redirect('/kategori')->with([
                'destroy' => "Data Berhasil Dihapus"
            ]);
        }

        return redirect('/kategori')->withErrors([
            'error' => 'Gagal menghapus data karena masih ada data barang yang menggunakan kategori ini'
        ]);
    }
}
