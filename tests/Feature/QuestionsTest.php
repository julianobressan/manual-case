<?php

namespace Tests\Feature;

use App\Modules\Questions\Entities\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_all_questions(): void
    {
        $question = Question::factory()->create();
        $response = $this->get('/api/v1/questions');

        $response->assertStatus(200);
        $response->assertJson([$question->toArray()]);
    }
}
