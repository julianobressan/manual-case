<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $answers = [
            [
                'id' => 1,
                'statement' => 'Yes',
                'question_id' => 1,
                'next_question_id' => null,
                'order' => 1
            ],
            [
                'id' => 2,
                'statement' => 'No',
                'question_id' => 1,
                'next_question_id' => null,
                'order' => 2
            ],
            [
                'id' => 3,
                'statement' => 'Viagra or Sildenafil',
                'question_id' => 2,
                'next_question_id' => 3,
                'order' => 1
            ],
            [
                'id' => 4,
                'statement' => 'Cialis or Tadalafil',
                'question_id' => 2,
                'next_question_id' => 4,
                'order' => 2
            ],
            [
                'id' => 5,
                'statement' => 'Both',
                'question_id' => 2,
                'next_question_id' => null,
                'order' => 3
            ],
            [
                'id' => 6,
                'statement' => 'None of the above',
                'question_id' => 2,
                'next_question_id' => null,
                'order' => 4
            ],
            [
                'id' => 7,
                'statement' => 'Yes',
                'question_id' => 3,
                'next_question_id' => null,
                'order' => 1
            ],
            [
                'id' => 8,
                'statement' => 'No',
                'question_id' => 3,
                'next_question_id' => null,
                'order' => 2
            ],
            [
                'id' => 9,
                'statement' => 'Yes',
                'question_id' => 4,
                'next_question_id' => null,
                'order' => 1
            ],
            [
                'id' => 10,
                'statement' => 'No',
                'question_id' => 4,
                'next_question_id' => null,
                'order' => 2
            ],
        ];
        DB::table('answers')->insert($answers);
    }
}
