<?php

namespace Tests\Feature;

use App\Modules\Questions\Entities\Answer;
use App\Modules\Questions\Entities\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AnswersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @covers \App\Modules\Questions\Http\Controllers\AnswerController::get
     */
    public function test_get(): void
    {
        /** @var Question[] $questions */
        $questions = Question::factory(3)->create();
        $answers = [];
        foreach ($questions as $question) {
            $answers = array_merge($answers, Answer::factory(2)->create(['question_id' => $question->id])->toArray());
        }
        $response = $this->get('/api/v1/questions/' . $questions[1]->id . '/answers/' . $answers[3]['id']);

        $response->assertOk();
        $this->assertStringContainsString('"statement":"' . $answers[3]['statement'], $response->content());
    }

    /**
     * @covers \App\Modules\Questions\Http\Controllers\AnswerController::create
     */
    public function test_create(): void
    {
        /** @var Question[] $questions */
        $questions = Question::factory(2)->create();
        Answer::factory(3)->create(['question_id' => $questions[0]->id]);

        $body = [
            'payload' => [
                'statement' => fake()->word(),
                'order' => 4,
                'next_question_id' => $questions[1]->id
            ]
        ];

        $response = $this->post('/api/v1/questions/' . $questions[0]->id . '/answers/', $body);

        $response->assertCreated();
        $this->assertStringContainsString('"statement":"' . $body['payload']['statement'], $response->content());
    }

    /**
     * @covers \App\Modules\Questions\Http\Controllers\AnswerController::delete
     */
    public function test_delete(): void
    {
        $question = Question::factory(1)->create();
        $answers = Answer::factory(3)->create(['question_id' => $question->first()->id])->toArray();

        $this->delete('/api/v1/questions/' . $question->id . '/answers/' . $answers[1]['id']);

        $answer = Answer::find($answers[1]['id']);
        $this->assertNull($answer);
    }
}
