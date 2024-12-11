<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

 class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $primaryKey = 'token_kategori';
    protected $fillable = ['token_kategori', 'nama_kategori'];
    protected $keyType = 'string';

    public function getRouteKeyName()
    {
        return 'token_kategori';
    }

    public function medikit()
    {
        return $this->belongsTo(Medikit::class, 'id_kategori', 'kategori_id');
    }
}