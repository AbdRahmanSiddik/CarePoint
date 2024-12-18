<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Medikit;
use App\Http\Requests\MedikitRequest;
use App\Models\Supplier;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MedikitController extends Controller
{
    public function index()
    {
        $key = isset($_GET['key']) ? $_GET['key'] : false ;

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
        if(isset($_GET['key'])){
            $key_kategori = $_GET['key'];
        }else{
            $key_kategori = null;
        }

        return view('admin.medikit.tambah-medikit', compact('key_kategori'));
    }

    public function store(MedikitRequest $request)
    {
        $nama_medikit = $request->nama_medikit;
        $deskripsi = $request->deskripsi;
        $stok = $request->stok;
        $kategori_id = Kategori::where('token_kategori', $request->kategori)->first()->id_kategori;
        $supplier_id = Supplier::where('token_supplier', $request->supplier)->first()->id_supplier;

        // thumbnail
        $file = $request->file('thumbnail');
        $file_name = $nama_medikit.".".$file->getClientOriginalExtension();

        // harga & harga jual
        $harga = $request->harga;
        $persentase_profit = $request->harga_jual;
        $profit = $harga * ($persentase_profit/100);
        $harga_jual = $harga + $profit;

        $token = Str::random(16);

        Medikit::create([
            'token_medikit' => $token,
            'kategori_id' => $kategori_id,
            'supplier_id' => $supplier_id,
            'nama_medikit' => $nama_medikit,
            'thumbnail' => $file_name,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'harga_jual' => $harga_jual,
            'stok' => $stok,
        ]);
        $file->move('images/medikits', $file_name);

        return redirect('/medikit')->with([
            'store' => "Data $nama_medikit Berhasil Dimasukkan"
        ]);
    }

    public function edit(Medikit $medikit)
    {
        $key_kategori = Kategori::where('id_kategori', $medikit->kategori_id)->first()->token_kategori;
        $key_supplier = Supplier::where('id_supplier', $medikit->supplier_id)->first()->token_supplier;
        $detail = $medikit;
        $selisih = $medikit->harga_jual - $medikit->harga;
        $beli = $selisih / $medikit->harga;
        $profit = $beli * 100;

        return view('admin.medikit.edit-medikit', compact('key_kategori', 'key_supplier', 'detail', 'profit'));
    }

    public function update(MedikitRequest $request, Medikit $medikit)
    {
        $old_medikit = $medikit->nama_medikit;
        $nama_medikit = $request->nama_medikit;
        $deskripsi = $request->deskripsi;
        $stok = $request->stok;
        $kategori_id = Kategori::where('token_kategori', $request->kategori)->first()->id_kategori;
        $supplier_id = Supplier::where('token_supplier', $request->supplier)->first()->id_supplier;

        // thumbnail
        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $file_name = $nama_medikit.".".$file->getClientOriginalExtension();
            $file->move('images/medikits', $file_name);

            File::delete("/images/medikits/$medikit->thumbnail");
        }else{
            $file_name = $medikit->thumbnail;
        }

        // harga & harga jual
        $harga = $request->harga;
        $persentase_profit = $request->harga_jual;
        $profit = $harga * ($persentase_profit/100);
        $harga_jual = $harga + $profit;

        $token = Str::random(16);

        $medikit->update([
            'token_medikit' => $token,
            'kategori_id' => $kategori_id,
            'supplier_id' => $supplier_id,
            'nama_medikit' => $nama_medikit,
            'thumbnail' => $file_name,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'harga_jual' => $harga_jual,
            'stok' => $stok,
        ]);

        return redirect('/medikit')->with([
            'update' => "Data $old_medikit --> $nama_medikit berhasil di edit"
        ]);
    }

    public function destroy(Medikit $medikit)
    {
        $nama_medikit = $medikit->nama_medikit;
        if($medikit->stok == 0){
            $medikit->delete();
            File::delete("/images/medikits/$medikit->thumbnail");

            return redirect('/medikit')->with([
                'destroy' => "Data $nama_medikit berhasil di hapus",
            ]);
        }else{
            return redirect('/medikit')->withErrors([
                'error' => "Gagal menghapus karena data $nama_medikit masih memiliki barang",
            ]);
        }
    }
}
