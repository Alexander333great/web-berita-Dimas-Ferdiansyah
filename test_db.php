
<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;

try {
    echo "--- Testing Category Create ---\n";
    $category = Category::create([
        'name' => 'Elektronik',
        'description' => 'Produk-produk elektronik',
    ]);
    echo "Created Category: " . $category->name . " (ID: " . $category->id . ")\n";

    echo "\n--- Testing Product Create ---\n";
    $product = Product::create([
        'category_id' => $category->id,
        'name' => 'Laptop ASUS',
        'description' => 'Laptop gaming powerful',
        'price' => 8500000,
        'stock' => 10,
        'is_active' => true,
    ]);
    echo "Created Product: " . $product->name . " (ID: " . $product->id . ")\n";

    echo "\n--- Testing Relationship: Category -> Products ---\n";
    $products = $category->products;
    echo "Category " . $category->name . " has " . $products->count() . " products.\n";
    foreach ($products as $p) {
        echo " - " . $p->name . "\n";
    }

    echo "\n--- Testing Relationship: Product -> Category ---\n";
    echo "Product " . $product->name . " belongs to category: " . $product->category->name . "\n";

    echo "\n--- Testing Tags and Many-to-Many ---\n";
    $tag1 = Tag::create(['name' => 'Elektronik']);
    $tag2 = Tag::create(['name' => 'Gaming']);
    
    $product->tags()->attach([$tag1->id, $tag2->id]);
    echo "Attached tags to product.\n";

    echo "Product " . $product->name . " tags:\n";
    foreach ($product->tags as $t) {
        echo " - " . $t->name . "\n";
    }

    echo "\n--- Testing Order and OrderItem ---\n";
    $user = \App\Models\User::first();
    $order = \App\Models\Order::create([
        'user_id' => $user->id,
        'total_price' => $product->price * 2,
        'status' => 'pending',
    ]);
    
    $orderItem = \App\Models\OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $product->id,
        'quantity' => 2,
        'price' => $product->price,
    ]);

    echo "Created Order ID: " . $order->id . " for user: " . $user->name . "\n";
    echo "Order Total Price: " . $order->total_price . "\n";
    echo "Order Item: " . $orderItem->product->name . " (Qty: " . $orderItem->quantity . ")\n";

    echo "\n--- ALL TESTS PASSED ---\n";

} catch (\Exception $e) {
    echo "\n!!! ERROR: " . $e->getMessage() . "\n";
}
