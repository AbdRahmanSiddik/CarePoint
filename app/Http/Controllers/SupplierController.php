<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Support\Str;

class SupplierController extends Controller
{
    public function index()
    {
        $data = [
            'suppliers' => Supplier::withCount('medikit')->get()
        ];
        return view('admin.supplier.data-supplier', $data);
    }

    public function store(SupplierRequest $request)
    {
        $token = Str::random(16);
        $nama_supplier = $request->supplier;
        $kontak = $request->kontak;
        $alamat = $request->alamat;

        $data = [
            'token_supplier' => $token,
            'nama_supplier' => $nama_supplier,
            'kontak' => $kontak,
            'alamat' => $alamat,
        ];

        Supplier::create($data);

        return redirect('/supplier')->with([
            'store' => "Data $nama_supplier Berhasil Dimasukkan"
        ]);
    }

    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $token = Str::random(16);
        $nama_supplier = $request->supplier;
        $kontak = $request->kontak;
        $alamat = $request->alamat;

        $data = [
            'token_supplier' => $token,
            'nama_supplier' => $nama_supplier,
            'kontak' => $kontak,
            'alamat' => $alamat,
        ];

        $old_supplier = $supplier->nama_supplier;
        $supplier->update($data);

        return redirect('/supplier')->with([
            'update' => "Data $old_supplier --> $nama_supplier Berhasil Diedit"
        ]);
    }

    public function destroy(Supplier $supplier)
    {
        $cek = $supplier->medikit()->count();

        if($cek == 0){
            $supplier->delete();
            return redirect('/supplier')->with([
                'destroy' => "Data Berhasil Dihapus"
            ]);
        }

        return redirect('/supplier')->withErrors([
            'error' => 'Gagal menghapus data karena masih ada data barang yang menggunakan supplier ini'
        ]);
    }
}
