<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Medikit;
use App\Models\Supplier;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan kategori
        Kategori::create([
            'token_kategori' => Str::random(16),
            'nama_kategori' => 'Obat',
        ]);
        Kategori::create([
            'token_kategori' => Str::random(16),
            'nama_kategori' => 'Alat Kesehatan',
        ]);

        // Menambahkan supplier
        for ($i = 0; $i < 10; $i++) {
            Supplier::create([
                'token_supplier' => Str::random(16),
                'nama_supplier' => fake()->name(),
                'alamat' => fake()->address(),
                'kontak' => fake()->phoneNumber(),
            ]);
        }

        $client = new Client();
        $image_path = public_path('images\medikits');
        if (!file_exists($image_path)) {
            mkdir($image_path, 0777, true);
        }

        // Membaca CSV obat
        $csv_obat = file_get_contents(public_path('seeders\obat_data.csv'));
        $rows_obat = array_map('str_getcsv', explode("\n", $csv_obat));
        $header_obat = array_shift($rows_obat); // Mengambil header CSV

        // Membaca CSV alkes (Alat Kesehatan)
        $csv_alkes = file_get_contents(public_path('seeders\alkes_data.csv'));
        $rows_alkes = array_map('str_getcsv', explode("\n", $csv_alkes));
        $header_alkes = array_shift($rows_alkes); // Mengambil header CSV

        // Menyimpan data dari CSV obat ke dalam tabel
        foreach ($rows_obat as $csv) {
            if (count($csv) === count($header_obat)) {
                $data = array_combine($header_obat, $csv);

                // Pastikan data yang dibutuhkan ada
                if (isset($data['kategori'], $data['nama'], $data['deskripsi'], $data['harga'])) {
                    // Mengunduh gambar dan menyimpannya
                    $imageUrl = 'https://picsum.photos/640/480';
                    $imageName = uniqid('image_') . '.jpg';
                    $imagePath = $image_path . DIRECTORY_SEPARATOR . $imageName;

                    try {
                        $response = $client->get($imageUrl);
                        file_put_contents($imagePath, $response->getBody());
                        $jual = ((fake()->randomElement([0.5, 1, 2, 1.5])/100) * $data['harga']) + $data['harga'];

                        // Menyimpan medikit ke database
                        Medikit::create([
                            'token_medikit' => Str::random(16),
                            'kategori_id' => $data['kategori'],  // Pastikan pemetaan kolom sesuai
                            'supplier_id' => mt_rand(1, 10),
                            'nama_medikit' => $data['nama'],
                            'thumbnail' => 'images/' . $imageName,
                            'deskripsi' => $data['deskripsi'],
                            'harga' => $data['harga'],
                            'harga_jual' => $jual,
                            'stok' => fake()->randomElement([30, 35, 40, 25, 23, 19, 31, 28, 33]),
                        ]);

                        echo "Gambar {$imageName} berhasil disimpan.\n";
                    } catch (\Throwable $e) {
                        echo "Gagal mendownload gambar: " . $e->getMessage() . "\n";
                    }
                } else {
                    echo "Data tidak valid: " . implode(',', $csv) . "\n";
                }
            } else {
                echo "Baris tidak valid (jumlah kolom tidak sesuai header): " . implode(',', $csv) . "\n";
            }
        }

        // Menyimpan data dari CSV alkes ke dalam tabel
        foreach ($rows_alkes as $csv) {
            if (count($csv) === count($header_alkes)) {
                $data = array_combine($header_alkes, $csv);

                // Pastikan data yang dibutuhkan ada
                if (isset($data['kategori'], $data['nama'], $data['deskripsi'], $data['harga'])) {
                    // Mengunduh gambar dan menyimpannya
                    $imageUrl = 'https://picsum.photos/640/480';
                    $imageName = uniqid('image_') . '.jpg';
                    $imagePath = $image_path . DIRECTORY_SEPARATOR . $imageName;

                    try {
                        $response = $client->get($imageUrl);
                        file_put_contents($imagePath, $response->getBody());

                        $jual = ((fake()->randomElement([0.5, 1, 2, 1.5])/100) * $data['harga']) + $data['harga'];

                        // Menyimpan medikit ke database
                        Medikit::create([
                            'token_medikit' => Str::random(16),
                            'kategori_id' => $data['kategori'],  // Pastikan pemetaan kolom sesuai
                            'supplier_id' => mt_rand(1, 10),
                            'nama_medikit' => $data['nama'],
                            'thumbnail' => 'images/' . $imageName,
                            'deskripsi' => $data['deskripsi'],
                            'harga' => $data['harga'],
                            'harga_jual' => $jual,
                            'stok' => fake()->randomElement([30, 35, 40, 25, 23, 19, 31, 28, 33]),
                        ]);

                        echo "Gambar {$imageName} berhasil disimpan.\n";
                    } catch (\Throwable $e) {
                        echo "Gagal mendownload gambar: " . $e->getMessage() . "\n";
                    }
                } else {
                    echo "Data tidak valid: " . implode(',', $csv) . "\n";
                }
            } else {
                echo "Baris tidak valid (jumlah kolom tidak sesuai header): " . implode(',', $csv) . "\n";
            }
        }
    }
}
