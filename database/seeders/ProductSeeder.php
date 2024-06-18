<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Sildenafil 50mg',
                'reference' => 'sildenafil_50'
            ],
            [
                'id' => 2,
                'name' => 'Sildenafil 100mg',
                'reference' => 'sildenafil_100'
            ],
            [
                'id' => 3,
                'name' => 'Tadalafil 10mg',
                'reference' => 'tadalafil_10'
            ],
            [
                'id' => 4,
                'name' => 'Tadalafil 20mg',
                'reference' => 'tadalafil_20'
            ],
        ];
        DB::table('products')->insert($products);
    }
}
