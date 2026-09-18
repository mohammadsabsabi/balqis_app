<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::create([
            'name' => 'متجر الامل',
            'description' => 'هذا المتجر متخصص في بيع الملابس والاكسسوارات',
            'status' => 'active',
        ]);

        Store::create([
            'name' => 'متجر الحياة',
            'description' => 'هذا المتجر متخصص في بيع الالكترونيات والاجهزة المنزلية',
            'status' => 'active',
        ]);
    }
}
