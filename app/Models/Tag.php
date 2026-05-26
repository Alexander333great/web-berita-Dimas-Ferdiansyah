<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    // Mass assignment: kolom yang boleh diisi langsung
    protected $fillable = ['name'];

    // Hubungan Balik: Tag ini dimiliki oleh Banyak Produk (Many-to-Many)
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}