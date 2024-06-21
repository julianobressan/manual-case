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
                'order' => 1
            ],
            [
                'id' => 2,
                'query' => 'Have you tried any of the following treatments before?',
                'order' => 2
            ],
            [
                'id' => 3,
                'query' => 'Was the Viagra or Sildenafil product you tried before effective?',
                'order' => 3
            ],
            [
                'id' => 4,
                'query' => 'Was the Cialis or Tadalafil product you tried before effective?',
                'order' => 4
            ],
            [
                'id' => 5,
                'query' => 'Which is your preferred treatment?',
                'order' => 5
            ],
            [
                'id' => 6,
                'query' => 'Do you have, or have you ever had, any heart or neurological conditions?',
                'order' => 6
            ],
            [
                'id' => 7,
                'query' => 'Do any of the listed medical conditions apply to you?',
                'order' => 7
            ],
            [
                'id' => 8,
                'query' => 'Are you taking any of the following drugs?',
                'order' => 8
            ],
        ];
        DB::table('questions')->insert($questions);
    }
}
