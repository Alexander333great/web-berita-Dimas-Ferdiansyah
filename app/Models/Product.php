<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    // Mass assignment: kolom yang boleh diisi langsung
    protected $fillable = [
        'category_id', 'name', 'description',
        'price', 'stock', 'is_active',
    ];

    // Cast tipe data secara otomatis
    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
        'stock' => 'integer',
    ];

    // Hubungan: Produk ini Milik sebuah Kategori (belongsTo)
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Hubungan: Produk ini memiliki Banyak Tag (Many-to-Many)
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}