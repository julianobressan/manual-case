<?php

namespace App\Modules\Questions\Tests\Factories;

use App\Modules\Questions\Entities\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Answer>
 */
class AnswerFactory extends Factory
{
    protected $model = Answer::class;

    private static int $order = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $order = Answer::where('question_id', 1)->max('order');
        if ($order) {
            self::$order = $order;
        }
        return [
            'question_id' => 1,
            'statement' => $this->faker->word(),
            'order' => ++self::$order
        ];
    }
}
