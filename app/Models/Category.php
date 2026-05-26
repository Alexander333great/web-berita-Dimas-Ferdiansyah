<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Mass assignment: kolom yang boleh diisi langsung
    protected $fillable = ['name', 'description'];

    // Hubungan: Satu Kategori memiliki Banyak Produk (hasMany)
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
