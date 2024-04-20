<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'nim' => fake()->unique()->numerify('##########'),
            'major' => fake()->sentence(2),
            'email' => fake()->unique()->email(),
            'phone_number' => fake()->phoneNumber(),
            'image' => 'dummy1.png'

        ];
    }
}
