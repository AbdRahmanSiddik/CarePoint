<?php

namespace App\Providers;

use App\Models\Kategori;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('kategori', function () {
           $kategori = Kategori::select('nama_kategori', 'token_kategori')->get();
           return $kategori;
        });
    }
}
