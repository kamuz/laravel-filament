<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Hierarchy:
     *   Level 1 (parent_id = 0)  → root categories
     *   Level 2 (parent_id = 1)  → children
     *   Level 3 (parent_id = 6)  → grandchildren
     *   Level 4 (parent_id = 11) → great-grandchildren
     */
    public function run(): void
    {
        // Optional: clear the table before seeding
        // DB::table('categories')->truncate();

        $categories = [

            // LEVEL 1 — Root categories (parent_id = 0)
            [
                'id' => 1,
                'title' => 'Electronics',
                'slug' => 'electronics',
                'parent_id' => null,
                'description' => 'Smartphones, laptops, TVs and other tech',
                'photo' => null,
            ],
            [
                'id' => 2,
                'title' => 'Clothing & Shoes',
                'slug' => 'clothing-and-shoes',
                'parent_id' => null,
                'description' => 'Men\'s, women\'s and kids\' clothing',
                'photo' => null,
            ],

            // LEVEL 2 — Children (parent_id points to Level 1)

            // Children of Electronics (parent_id = 1)
            [
                'id' => 3,
                'title' => 'Smartphones',
                'slug' => 'smartphones',
                'parent_id' => 1,
                'description' => 'Mobile phones and accessories',
                'photo' => null,
            ],
            [
                'id' => 4,
                'title' => 'Laptops',
                'slug' => 'laptops',
                'parent_id' => 1,
                'description' => 'Portable computers for work and study',
                'photo' => null,
            ],
            [
                'id' => 5,
                'title' => 'TVs',
                'slug' => 'tvs',
                'parent_id' => 1,
                'description' => 'Smart TVs and monitors',
                'photo' => null,
            ],

            // Children of Clothing & Shoes (parent_id = 2)
            [
                'id' => 6,
                'title' => 'Men\'s Clothing',
                'slug' => 'mens-clothing',
                'parent_id' => 2,
                'description' => 'T-shirts, pants, jackets',
                'photo' => null,
            ],
            [
                'id' => 7,
                'title' => 'Women\'s Clothing',
                'slug' => 'womens-clothing',
                'parent_id' => 2,
                'description' => 'Dresses, blouses, skirts',
                'photo' => null,
            ],

            // LEVEL 3 — Grandchildren (parent_id points to Level 2)

            // Grandchildren of Smartphones (parent_id = 3)
            [
                'id' => 8,
                'title' => 'Android Phones',
                'slug' => 'android-phones',
                'parent_id' => 3,
                'description' => 'Android smartphones from all brands',
                'photo' => null,
            ],
            [
                'id' => 9,
                'title' => 'iPhones',
                'slug' => 'iphones',
                'parent_id' => 3,
                'description' => 'Apple iPhone smartphones',
                'photo' => null,
            ],

            // Grandchildren of Laptops (parent_id = 4)
            [
                'id' => 10,
                'title' => 'Gaming Laptops',
                'slug' => 'gaming-laptops',
                'parent_id' => 4,
                'description' => 'High-performance laptops for gaming',
                'photo' => null,
            ],
            [
                'id' => 11,
                'title' => 'Ultrabooks',
                'slug' => 'ultrabooks',
                'parent_id' => 4,
                'description' => 'Thin and light laptops for everyday use',
                'photo' => null,
            ],

            // Grandchildren of Men's Clothing (parent_id = 6)
            [
                'id' => 12,
                'title' => 'Men\'s T-Shirts',
                'slug' => 'mens-t-shirts',
                'parent_id' => 6,
                'description' => 'Casual and sport t-shirts for men',
                'photo' => null,
            ],
            [
                'id' => 13,
                'title' => 'Men\'s Jackets',
                'slug' => 'mens-jackets',
                'parent_id' => 6,
                'description' => 'Winter, autumn and spring jackets for men',
                'photo' => null,
            ],

            // LEVEL 4 — Great-grandchildren (parent_id points to Level 3)

            // Great-grandchildren of Android Phones (parent_id = 8)
            [
                'id' => 14,
                'title' => 'Samsung Phones',
                'slug' => 'samsung-phones',
                'parent_id' => 8,
                'description' => 'Samsung Galaxy smartphones',
                'photo' => null,
            ],
            [
                'id' => 15,
                'title' => 'Xiaomi Phones',
                'slug' => 'xiaomi-phones',
                'parent_id' => 8,
                'description' => 'Xiaomi and Redmi smartphones',
                'photo' => null,
            ],

            // Great-grandchildren of Gaming Laptops (parent_id = 10)
            [
                'id' => 16,
                'title' => 'ASUS Gaming Laptops',
                'slug' => 'asus-gaming-laptops',
                'parent_id' => 10,
                'description' => 'ASUS ROG and TUF gaming laptops',
                'photo' => null,
            ],
            [
                'id' => 17,
                'title' => 'MSI Gaming Laptops',
                'slug' => 'msi-gaming-laptops',
                'parent_id' => 10,
                'description' => 'MSI gaming laptops',
                'photo' => null,
            ],

            // Great-grandchildren of Men's T-Shirts (parent_id = 12)
            [
                'id' => 18,
                'title' => 'Cotton T-Shirts',
                'slug' => 'cotton-t-shirts',
                'parent_id' => 12,
                'description' => '100% cotton t-shirts for men',
                'photo' => null,
            ],
            [
                'id' => 19,
                'title' => 'Sport T-Shirts',
                'slug' => 'sport-t-shirts',
                'parent_id' => 12,
                'description' => 'Quick-dry sport t-shirts for men',
                'photo' => null,
            ],
        ];

        $now = now();

        // Add timestamps to every row
        $categories = array_map(function ($category) use ($now) {
            $category['created_at'] = $now;
            $category['updated_at'] = $now;
            return $category;
        }, $categories);

        DB::table('categories')->insert($categories);
    }
}