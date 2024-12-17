<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'token_supplier';
    protected $guarded = ['id_supplier', 'created_at', 'updated_at'];
    protected $keyType = 'string';

    public function getRouteKeyName()
    {
        return 'token_supplier';
    }

    public function medikit()
    {
        return $this->hasMany(Medikit::class, 'supplier_id', 'id_supplier');
    }
}
