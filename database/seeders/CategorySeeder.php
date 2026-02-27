<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Hair Care'],
            ['name' => 'Skin Care'],
            ['name' => 'Makeup'],
            ['name' => 'Fragrance'],
            ['name' => 'Man'],
            ['name' => 'Health & Wellness'],
            ['name' => 'Home & SPA'],
        ];
        foreach ($categories as $category) {
            Category::Create($category);
        }
    }
}
