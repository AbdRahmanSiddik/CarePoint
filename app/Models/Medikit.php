<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medikit extends Model
{
    protected $table = 'medikits';
    protected $primaryKey = 'token_medikit';
    protected $keyType = 'string';
    protected $guarded = ['id_medikit', 'created_at', 'updated_at'];

    public function getRouteKeyName()
    {
        return 'token_medikit';
    }

    public function kategori()
    {
        return $this->hasMany(Kategori::class, 'id_kategori', 'kategori_id');
    }
}