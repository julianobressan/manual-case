<?php

namespace App\Modules\Questions\Tests\Factories;

use App\Modules\Questions\Entities\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 * @extends Factory<Question>
 */
class QuestionFactory extends Factory
{
    protected $model = Question::class;

    private static int $order = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $order = Question::max('order');
        if ($order) {
            self::$order = $order;
        }

        return [
            'query' => $this->faker->paragraph(1) . '?',
            'order' => ++self::$order,
        ];
    }
}
