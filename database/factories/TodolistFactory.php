<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todolist>
 */
class TodolistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'subjek' => $this->faker->sentence(mt_rand(2, 5)),
            'todo' => $this->faker->sentence(mt_rand(1, 3))
        ];
    }
}
