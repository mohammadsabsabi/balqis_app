<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'كهربائيات', 
            'description' => ' كهربائية متنوعة',
            'status' => 'active',
        ]);
          Category::create([
            'name' => 'موديلات', 
            'description' => ' موديلات متنوعة ',
            'status' => 'active',
        ]);
          Category::create([
            'name' => 'موبايلات', 
            'description' => ' موبايلات متنوعة',
            'status' => 'active',
        ]);
    }
}
