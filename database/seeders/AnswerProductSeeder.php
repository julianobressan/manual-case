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
                'answer_id' => 2,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 2,
                'exclude' => true
            ],
            [
                'product_id' => 3,
                'answer_id' => 2,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 2,
                'exclude' => true
            ],
            [
                'product_id' => 1,
                'answer_id' => 6,
                'exclude' => false
            ],
            [
                'product_id' => 3,
                'answer_id' => 6,
                'exclude' => false
            ],
            [
                'product_id' => 1,
                'answer_id' => 7,
                'exclude' => false
            ],
            [
                'product_id' => 3,
                'answer_id' => 7,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 7,
                'exclude' => true
            ],
            [
                'product_id' => 1,
                'answer_id' => 8,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 8,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 8,
                'exclude' => false
            ],
            [
                'product_id' => 3,
                'answer_id' => 9,
                'exclude' => false
            ],
            [
                'product_id' => 1,
                'answer_id' => 9,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 9,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 10,
                'exclude' => false
            ],
            [
                'product_id' => 3,
                'answer_id' => 10,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 10,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 11,
                'exclude' => false
            ],
            [
                'product_id' => 3,
                'answer_id' => 11,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 11,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 12,
                'exclude' => false
            ],
            [
                'product_id' => 1,
                'answer_id' => 12,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 12,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 13,
                'exclude' => false
            ],
            [
                'product_id' => 4,
                'answer_id' => 13,
                'exclude' => false
            ],
            [
                'product_id' => 1,
                'answer_id' => 14,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 14,
                'exclude' => true
            ],
            [
                'product_id' => 3,
                'answer_id' => 14,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 14,
                'exclude' => true
            ],
            [
                'product_id' => 1,
                'answer_id' => 16,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 16,
                'exclude' => true
            ],
            [
                'product_id' => 3,
                'answer_id' => 16,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 16,
                'exclude' => true
            ],
            [
                'product_id' => 1,
                'answer_id' => 17,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 17,
                'exclude' => true
            ],
            [
                'product_id' => 3,
                'answer_id' => 17,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 17,
                'exclude' => true
            ],
            [
                'product_id' => 1,
                'answer_id' => 18,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 18,
                'exclude' => true
            ],
            [
                'product_id' => 3,
                'answer_id' => 18,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 18,
                'exclude' => true
            ],
            [
                'product_id' => 1,
                'answer_id' => 19,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 19,
                'exclude' => true
            ],
            [
                'product_id' => 3,
                'answer_id' => 19,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 19,
                'exclude' => true
            ],
            [
                'product_id' => 1,
                'answer_id' => 21,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 21,
                'exclude' => true
            ],
            [
                'product_id' => 3,
                'answer_id' => 21,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 21,
                'exclude' => true
            ],
            [
                'product_id' => 1,
                'answer_id' => 22,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 22,
                'exclude' => true
            ],
            [
                'product_id' => 3,
                'answer_id' => 22,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 22,
                'exclude' => true
            ],
            [
                'product_id' => 1,
                'answer_id' => 23,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 23,
                'exclude' => true
            ],
            [
                'product_id' => 3,
                'answer_id' => 23,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 23,
                'exclude' => true
            ],
            [
                'product_id' => 1,
                'answer_id' => 24,
                'exclude' => true
            ],
            [
                'product_id' => 2,
                'answer_id' => 24,
                'exclude' => true
            ],
            [
                'product_id' => 3,
                'answer_id' => 24,
                'exclude' => true
            ],
            [
                'product_id' => 4,
                'answer_id' => 24,
                'exclude' => true
            ],
        ];
        DB::table('answer_product')->insert($products);
    }
}
