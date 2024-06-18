<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'product_id' => 1,
                'answer_id' => 6
            ],
            [
                'product_id' => 3,
                'answer_id' => 6
            ],
            [
                'product_id' => 1,
                'answer_id' => 7
            ],
            [
                'product_id' => 4,
                'answer_id' => 8
            ],
            [
                'product_id' => 3,
                'answer_id' => 9
            ],
            [
                'product_id' => 2,
                'answer_id' => 10
            ],
        ];
        DB::table('answer_product')->insert($products);
    }
}
