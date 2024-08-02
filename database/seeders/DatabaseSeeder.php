<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Remove entries in 'products' table
        Product::truncate();

        // Remove entries in 'categories' table
        Category::truncate();

        // Create instances of the 'Product' model
       // Product::factory()->count(15)->create();

        for ($i=1; $i <= 10; $i++) { 
            
            $category = Category::factory()->create();

            Product::factory()->count(3)->create(['category_id' => $category->id]);


        } 

    }
}