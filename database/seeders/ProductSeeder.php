<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'name');
        $products = json_decode(file_get_contents(database_path('seeders/data/products.json')), true);

        foreach ($products as $product) {
            $filename = basename($product['image_url']);
            $sourcePath = public_path('images/products/' . $filename);
            $storagePath = 'products/' . $filename;

            if (file_exists($sourcePath)) {
                Storage::disk('public')->put($storagePath, file_get_contents($sourcePath));
            }

            Product::create([
                'name' => $product['name'],
                'category_id' => $categories[$product['category']],
                'description' => $product['description'],
                'price' => $product['price'],
                'image_url' => $storagePath,
            ]);
        }
    }
}
