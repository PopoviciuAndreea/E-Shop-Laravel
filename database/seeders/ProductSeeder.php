<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
                 [
                'name' => 'Huawei MateBook D15',
                'description' => 'i5-1135G7, 8GB, 512GB SSD',
                'image' => '../img/LaptopHuawei.jpg',
                'price' => 2999
                 ],
                 [
                'name' => 'Apple MacBook Air',
                'description' => 'Apple M1, 8GB, Retina Display',
                'image' => '../img/Macbook.jpg',
                'price' => 4900
                ],
                [
                'name' => 'Huawei MateBook D16',
                'description' => 'i5-12450H, 8GB, 512 SSD',
                'image' => '../img/LaptopHuawei2.jpg',
                'price' => 3399
                ],
                [
                'name' => 'Asus ZenBook 14X',
                'description' => 'i7-1260P, 16GB, 512GB',
                'image' => '../img/LaptopAsus3.jpg',
                'price' => 6363
                ],
                [
                'name' => 'Apple MacBook Pro',
                'description' => 'Apple M2, 8GB, 256GB SSD',
                'image' => '../img/Macbook2.png',
                'price' => 6500
                ],
            ];

            foreach($products as $key => $value) {
                Product::create($value);
            }
    }
}
