<?php

namespace App\Http\Controllers;

use App\Models\Medikit;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('admin.transaksi.view-transaksi');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $token = Str::random(16);
        $nama_customer = $request->nama_customer;
        $alamat_customer = $request->alamat_customer;
        $kontak = $request->kontak;
        $total = $request->total;

        // Ambil data `id_barang` dan `kuantitas` dari request
        $id_barang = $request->input('id_barang', []);
        $kuantitas = $request->input('kuantitas', []);

        $data = [
            'token_transaksi' => $token,
            'nama_customer' => $nama_customer,
            'alamat_customer' => $alamat_customer,
            'kontak' => $kontak,
            'total_harga' => $total,
            'jumlah_barang' => array_sum($kuantitas),
            '_karyawan' => auth()->user()->id,
            'created_at' => now()
        ];

        $customer = Transaksi::insertGetId($data);

        // Ambil ID pembayaran yang baru saja dibuat
        $pembayaran_id = $customer;
        // dd($pembayaran_id);

        // Siapkan data untuk sinkronisasi dengan menyertakan pembayaran_id
        $syncData = [];
        foreach ($id_barang as $key => $barang_id) {
            $jumlah_harga = Medikit::where('id_medikit', $barang_id)->first();
            $syncData[$barang_id] = [
                'token_detail' => Str::random(16),
                'kuantitas' => $kuantitas[$key],
                'transaksi_id' => $pembayaran_id,  // Menambahkan pembayaran_id
                'jumlah_harga' => $jumlah_harga->harga_jual * $kuantitas[$key],
            ];

            // Kurangi stok barang berdasarkan kuantitas yang dipesan
            $barang = Medikit::where('id_medikit', $barang_id)->first();
            if ($barang) {
                $barang->update(['stok' => $barang->stok - $kuantitas[$key]]);
            }
        }

        // Sinkronisasi data dengan tabel pivot, sekarang menyertakan pembayaran_id
        $pembayaran = new Transaksi();
        $pembayaran->barang()->sync($syncData);

        // Redirect ke dashboard dengan pesan sukses
        return redirect()->route('transaksi.show', $token)->with('success', 'Data berhasil disimpan.');
    }

    public function show(Transaksi $transaksi)
    {
        return view('admin.transaksi.detail', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        //
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
