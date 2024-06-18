<?php

namespace Database\Factories\Modules\Questions\Entities;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Questions\Entities\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'query' => $this->faker->paragraph(1) . '?',
            'numbering' => $this->faker->randomNumber(2),
            'primary_order' => $this->faker->randomNumber(2),
        ];
    }
}
