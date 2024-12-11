<?php

if (!function_exists('kategori_raw')){
    function kategori_raw()
    {
        return \App\Models\Kategori::select('token_kategori','nama_kategori')->get();
    }
}
