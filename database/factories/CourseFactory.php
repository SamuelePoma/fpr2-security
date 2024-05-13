<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Programming', 'Computer Science', 'Framework','IT','PPD']).' '.$this->faker->randomElement(['Basics','Development','Exploration','Personality']),
            'term' => random_int(1,16),
            'credits' => random_int(1,10)
        ];
    }
}
