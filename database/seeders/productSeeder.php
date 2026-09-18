<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'مصابيح كهربائية',
                'description' => ' مصابيح كهربائية عالية الجودة',
                'price' => 100.00,
                'status' => 'active',
                'store_id' => 1,
                'category_id' => 1,
            ],

            [
                'name' => 'موديلات ملابس',
                'description' => 'موديلات ملابس عالية الجودة',
                'price' => 200.00,
                'status' => 'inactive',
                'store_id' => 1,
                'category_id' => 2,
            ],
 
            [
                'name' => ' موبايلات',
                'description' => 'موديلات موبايلات عالية الجودة',
                'price' => 300.00,
                'status' => 'active',
                'store_id' => 2,
                'category_id' => 3,
            ],

        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }   
}
