<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{

    protected $primaryKey = 'token_transaksi';
    protected $keyType = 'string';
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'token_transaksi';
    }

    public function barang(){
        return $this->belongsToMany(Medikit::class, 'details_transaksi', 'transaksi_id', 'medikit_id', 'id_transaksi', 'id_medikit')->withPivot(['kuantitas', 'jumlah_harga']);
    }

    public function karyawan(){
        return $this->belongsTo(User::class, '_karyawan', 'id');
    }
}
