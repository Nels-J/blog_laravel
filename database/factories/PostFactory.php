<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'article' => fake()->text(2000),
            'user_id' => User::inRandomOrder()->first(),  //query the user table to find an id to add it to the post
            'created_at' => fake()->dateTimeBetween('-1 month'),
        ];
    }
}
