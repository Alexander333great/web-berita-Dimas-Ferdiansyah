<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat User
        User::factory()->create([
            'name' => 'Admin Toko',
            'email' => 'admin@toko.com',
            'password' => bcrypt('password'),
        ]);

        // 2. Buat 5 Category
        $categories = [
            ['name' => 'Elektronik', 'description' => 'Gadget, Laptop, dan Kamera'],
            ['name' => 'Fashion', 'description' => 'Pakaian Pria dan Wanita'],
            ['name' => 'Kecantikan', 'description' => 'Skincare dan Makeup'],
            ['name' => 'Rumah Tangga', 'description' => 'Peralatan Dapur dan Furnitur'],
            ['name' => 'Olahraga', 'description' => 'Alat Gym dan Pakaian Olahraga'],
        ];

        foreach ($categories as $cat) {
            \App\Models\Category::create($cat);
        }

        // 3. Buat 10 Tags
        $tags = ['Baru', 'Promo', 'Terlaris', 'Limited', 'Original', 'Murah', 'Import', 'Lokal', 'Pre-order', 'Ready Stock'];
        $tagIds = [];
        foreach ($tags as $tagName) {
            $tag = \App\Models\Tag::create(['name' => $tagName]);
            $tagIds[] = $tag->id;
        }

        // 4. Buat 20 Products dengan Nama Spesifik
        $productsData = [
            // Elektronik (ID 1)
            ['category_id' => 1, 'name' => 'Laptop ASUS ROG', 'price' => 15000000, 'stock' => 10],
            ['category_id' => 1, 'name' => 'Smartphone Samsung S24', 'price' => 12000000, 'stock' => 15],
            ['category_id' => 1, 'name' => 'Monitor LG 24 Inch', 'price' => 2000000, 'stock' => 20],
            ['category_id' => 1, 'name' => 'Keyboard Mechanical Razer', 'price' => 1500000, 'stock' => 30],
            
            // Fashion (ID 2)
            ['category_id' => 2, 'name' => 'Kaos Polos Cotton Combed', 'price' => 75000, 'stock' => 100],
            ['category_id' => 2, 'name' => 'Jaket Denim Levis', 'price' => 450000, 'stock' => 25],
            ['category_id' => 2, 'name' => 'Celana Chino Slimfit', 'price' => 200000, 'stock' => 50],
            ['category_id' => 2, 'name' => 'Sepatu Sneakers Adidas', 'price' => 1200000, 'stock' => 12],
            
            // Kecantikan (ID 3)
            ['category_id' => 3, 'name' => 'Serum Vitamin C', 'price' => 120000, 'stock' => 40],
            ['category_id' => 3, 'name' => 'Sunscreen SPF 50', 'price' => 85000, 'stock' => 60],
            ['category_id' => 3, 'name' => 'Lipstik Matte Red', 'price' => 55000, 'stock' => 80],
            ['category_id' => 3, 'name' => 'Moisturizer Gel', 'price' => 95000, 'stock' => 45],
            
            // Rumah Tangga (ID 4)
            ['category_id' => 4, 'name' => 'Blender Philips', 'price' => 600000, 'stock' => 18],
            ['category_id' => 4, 'name' => 'Rice Cooker Yongma', 'price' => 850000, 'stock' => 10],
            ['category_id' => 4, 'name' => 'Set Pisau Dapur', 'price' => 150000, 'stock' => 35],
            ['category_id' => 4, 'name' => 'Lampu LED 12W', 'price' => 35000, 'stock' => 150],
            
            // Olahraga (ID 5)
            ['category_id' => 5, 'name' => 'Matras Yoga', 'price' => 150000, 'stock' => 20],
            ['category_id' => 5, 'name' => 'Dumbbell 5kg', 'price' => 250000, 'stock' => 15],
            ['category_id' => 5, 'name' => 'Bola Basket Spalding', 'price' => 400000, 'stock' => 8],
            ['category_id' => 5, 'name' => 'Raket Badminton Yonex', 'price' => 750000, 'stock' => 14],
        ];

        foreach ($productsData as $data) {
            $product = \App\Models\Product::create([
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'description' => "Deskripsi untuk " . $data['name'] . ". Produk berkualitas tinggi untuk kebutuhan Anda.",
                'price' => $data['price'],
                'stock' => $data['stock'],
                'is_active' => true,
            ]);

            // Hubungkan ke tag secara random (2-4 tag per produk)
            $randomTagIds = (array) array_rand(array_flip($tagIds), rand(2, 4));
            $product->tags()->attach($randomTagIds);
        }
    }
}
