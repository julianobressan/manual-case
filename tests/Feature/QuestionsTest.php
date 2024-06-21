<?php

namespace Tests\Feature;

use App\Modules\Questions\Entities\Answer;
use App\Modules\Questions\Entities\Question;
use App\Modules\Questions\Http\Resources\QuestionResource;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class QuestionsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @covers \App\Modules\Questions\Http\Controllers\QuestionController::getAll
     */
    public function test_get_all(): void
    {
        /** @var Question[] $questions */
        $questions = Question::factory(5)->create();
        foreach ($questions as $question) {
            Answer::factory(2)->create(['question_id' => $question->id]);
        }
        $response = $this->get('/api/v1/questions');
        $response->assertSuccessful();
        $responseContent = $response->content();
        $responseArray = $response->json();
        $this->assertCount(5, $responseArray['data']);
        foreach ($questions as $question) {
            $this->assertStringContainsString('"question_id":' . $question->id, $responseContent);
            $this->assertStringContainsString('"query":"' . $question->query . '","answers":[{"statement"', $responseContent);
        }

    }

    /**
     * @covers \App\Modules\Questions\Http\Controllers\QuestionController::get
     */
    public function test_get(): void
    {
        $questions = Question::factory(3)->create();
        $response = $this->get('/api/v1/questions/' . $questions[1]->id);
        $response->assertSuccessful();
        $baseExpectedArray = [
            'message' => 'Question information.',
            'status' => 200,
            'data' => (new QuestionResource($questions[1]))->jsonSerialize()
        ];
        $response->assertExactJson($baseExpectedArray);
    }

    /**
     * @covers \App\Modules\Questions\Http\Controllers\QuestionController::create
     */
    public function test_create(): void
    {
        $questions = Question::factory(2)->create();
        $body = [
            'payload' => [
                'query' => fake()->paragraph(1) . '?',
                'answers' => [
                    [
                        'statement' => fake()->word(),
                        'order' => 1,
                        'next_question_id' => $questions[0]->id
                    ],
                    [
                        'statement' => fake()->word(),
                        'order' => 2,
                        'next_question_id' => $questions[1]->id
                    ]
                ]
            ]
        ];
        $response = $this->post('/api/v1/questions/', $body);
        $response->assertCreated();
        $response->assertJsonFragment(['query' => $body['payload']['query']]);
        $this->assertCount(2, $response->json()['data']['answers']);
    }

    /**
     * @covers \App\Modules\Questions\Http\Controllers\QuestionController::delete
     */
    public function test_delete(): void
    {
        $questions = Question::factory(3)->create();

        $response = $this->delete('/api/v1/questions/' . $questions[1]->id);
        $response->assertNoContent();

        $question = Question::find($questions[1]->id);
        $this->assertNull($question);
    }
}
