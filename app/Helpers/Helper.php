<?php

if (!function_exists('kategori_raw')){
    function kategori_raw()
    {
        return \App\Models\Kategori::select('token_kategori','nama_kategori')->get();
    }
}

if (!function_exists('supplier_raw')){
    function supplier_raw()
    {
        return \App\Models\Supplier::select('token_supplier','nama_supplier')->get();
    }
}
