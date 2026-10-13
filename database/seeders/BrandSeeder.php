<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            // Sportswear
            ['title' => 'Nike', 'description' => 'Sportswear, footwear, and accessories.'],
            ['title' => 'Adidas', 'description' => 'Sports clothing, footwear, and sporting goods.'],
            ['title' => 'Puma', 'description' => 'Sportswear, footwear, and accessories.'],
            ['title' => 'Reebok', 'description' => 'Sports shoes, clothing, and fitness products.'],
            ['title' => 'Under Armour', 'description' => 'Performance apparel, footwear, and sports accessories.'],
            ['title' => 'New Balance', 'description' => 'Athletic footwear and sportswear.'],
            ['title' => 'ASICS', 'description' => 'Running shoes, sportswear, and athletic equipment.'],
            ['title' => 'Fila', 'description' => 'Sportswear, footwear, and casual clothing.'],

            // Fashion
            ['title' => 'Zara', 'description' => 'Fashion clothing, shoes, and accessories.'],
            ['title' => 'H&M', 'description' => 'Affordable fashion and everyday clothing.'],
            ['title' => 'Levi\'s', 'description' => 'Denim jeans, jackets, and casual clothing.'],
            ['title' => 'Calvin Klein', 'description' => 'Fashion apparel, underwear, and accessories.'],
            ['title' => 'Tommy Hilfiger', 'description' => 'Premium casual clothing and accessories.'],
            ['title' => 'Gucci', 'description' => 'Luxury fashion, handbags, shoes, and accessories.'],
            ['title' => 'Prada', 'description' => 'Luxury clothing, leather goods, and accessories.'],
            ['title' => 'Hugo Boss', 'description' => 'Premium fashion, suits, and casual clothing.'],

            // Electronics
            ['title' => 'Apple', 'description' => 'Smartphones, computers, tablets, and accessories.'],
            ['title' => 'Samsung', 'description' => 'Smartphones, televisions, and home electronics.'],
            ['title' => 'Xiaomi', 'description' => 'Smartphones, smart devices, and consumer electronics.'],
            ['title' => 'Sony', 'description' => 'Electronics, cameras, audio equipment, and gaming.'],
            ['title' => 'LG', 'description' => 'Televisions, home appliances, and electronics.'],
            ['title' => 'Huawei', 'description' => 'Smartphones, wearables, and telecommunications devices.'],
            ['title' => 'Lenovo', 'description' => 'Laptops, computers, tablets, and accessories.'],
            ['title' => 'Dell', 'description' => 'Computers, laptops, monitors, and IT equipment.'],
            ['title' => 'HP', 'description' => 'Laptops, desktops, printers, and computer accessories.'],

            // Beauty and personal care
            ['title' => 'L\'Oréal', 'description' => 'Cosmetics, skincare, haircare, and beauty products.'],
            ['title' => 'Nivea', 'description' => 'Skincare, body care, and personal care products.'],
            ['title' => 'Dove', 'description' => 'Personal care, skincare, and haircare products.'],

            // Home appliances
            ['title' => 'Bosch', 'description' => 'Home appliances, power tools, and technology.'],
            ['title' => 'Philips', 'description' => 'Consumer electronics, personal care, and home appliances.'],
        ];

        foreach ($brands as $brand) {
            $slug = Str::slug($brand['title']);

            DB::table('brands')->updateOrInsert(
                ['slug' => $slug],
                [
                    'title' => $brand['title'],
                    'description' => $brand['description'],
                    'photo' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
