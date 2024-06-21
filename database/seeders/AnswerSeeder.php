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
                'next_question_id' => 2,
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
                'next_question_id' => 5,
                'order' => 3
            ],
            [
                'id' => 6,
                'statement' => 'None of the above',
                'question_id' => 2,
                'next_question_id' => 6,
                'order' => 4
            ],
            [
                'id' => 7,
                'statement' => 'Yes',
                'question_id' => 3,
                'next_question_id' => 6,
                'order' => 1
            ],
            [
                'id' => 8,
                'statement' => 'No',
                'question_id' => 3,
                'next_question_id' => 6,
                'order' => 2
            ],
            [
                'id' => 9,
                'statement' => 'Yes',
                'question_id' => 4,
                'next_question_id' => 6,
                'order' => 1
            ],
            [
                'id' => 10,
                'statement' => 'No',
                'question_id' => 4,
                'next_question_id' => 6,
                'order' => 2
            ],
            [
                'id' => 11,
                'statement' => 'Viagra or Sildenafil',
                'question_id' => 5,
                'next_question_id' => 6,
                'order' => 1
            ],
            [
                'id' => 12,
                'statement' => 'Cialis or Tadalafil',
                'question_id' => 5,
                'next_question_id' => 6,
                'order' => 2
            ],
            [
                'id' => 13,
                'statement' => 'None of the above',
                'question_id' => 5,
                'next_question_id' => 6,
                'order' => 3
            ],
            [
                'id' => 14,
                'statement' => 'Yes',
                'question_id' => 6,
                'next_question_id' => null,
                'order' => 1
            ],
            [
                'id' => 15,
                'statement' => 'No',
                'question_id' => 6,
                'next_question_id' => 7,
                'order' => 2
            ],
            [
                'id' => 16,
                'statement' => 'Condition affecting your penis (such as Peyronie\'s Disease, previous injuries or an inability to retract your foreskin)',
                'question_id' => 7,
                'next_question_id' => null,
                'order' => 1
            ],
            [
                'id' => 17,
                'statement' => 'Significant liver problems (such as cirrhosis of the liver) or kidney problems',
                'question_id' => 7,
                'next_question_id' => null,
                'order' => 2
            ],
            [
                'id' => 18,
                'statement' => 'Currently prescribed GTN, Isosorbide mononitrate, Isosorbide dinitrate , Nicorandil (nitrates) or Rectogesic ointment',
                'question_id' => 7,
                'next_question_id' => null,
                'order' => 3
            ],
            [
                'id' => 19,
                'statement' => 'Abnormal blood pressure (lower than 90/50 mmHg or higher than 160/90 mmHg)',
                'question_id' => 7,
                'next_question_id' => null,
                'order' => 4
            ],
            [
                'id' => 20,
                'statement' => 'I don\'t have any of these conditions',
                'question_id' => 7,
                'next_question_id' => 8,
                'order' => 5
            ],
            [
                'id' => 21,
                'statement' => 'Alpha-blocker medication such as Alfuzosin, Doxazosin, Tamsulosin, Prazosin, Terazosin or over-the-counter Flomax',
                'question_id' => 8,
                'next_question_id' => null,
                'order' => 1
            ],
            [
                'id' => 22,
                'statement' => 'Riociguat or other guanylate cyclase stimulators (for lung problems)',
                'question_id' => 8,
                'next_question_id' => null,
                'order' => 2
            ],
            [
                'id' => 23,
                'statement' => 'Saquinavir, Ritonavir or Indinavir (for HIV)',
                'question_id' => 8,
                'next_question_id' => null,
                'order' => 3
            ],
            [
                'id' => 24,
                'statement' => 'Cimetidine (for heartburn)',
                'question_id' => 8,
                'next_question_id' => null,
                'order' => 4
            ],
            [
                'id' => 25,
                'statement' => 'I don\'t take any of these drugs',
                'question_id' => 8,
                'next_question_id' => null,
                'order' => 5
            ],
        ];
        DB::table('answers')->insert($answers);
    }
}
