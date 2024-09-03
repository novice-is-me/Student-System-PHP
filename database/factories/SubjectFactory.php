<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Digital Logic Design', 'Data Structures and Algorithms', 'Special Education', 'Sociology of Education', 'Criminal Justice System', 'Victimology', 'Cybersecurity', 'Embedded Systems']),
            'user_id' => User::factory(),
            'course_id' => Course::factory()
        ];
    }
}
