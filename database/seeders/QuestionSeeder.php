<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'id' => 1,
                'query' => 'Do you have difficulty getting or maintaining an erection?',
                'numbering' => '1',
                'primary_order' => 1
            ],
            [
                'id' => 2,
                'query' => 'Have you tried any of the following treatments before?',
                'numbering' => '2',
                'primary_order' => 1
            ],
            [
                'id' => 3,
                'query' => 'Was the Viagra or Sildenafil product you tried before effective?',
                'numbering' => '2A',
                'primary_order' => null
            ],
            [
                'id' => 4,
                'query' => 'Was the Cialis or Tadalafil product you tried before effective?',
                'numbering' => '2B',
                'primary_order' => null
            ],
        ];
        DB::table('questions')->insert($questions);
    }
}
