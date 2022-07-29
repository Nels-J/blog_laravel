<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $commentArray = [
            'post_id' => Post::inRandomOrder()->first(),  //query the post table to find an id to add it to the comment
            'content' => fake()->text(2000),
            'created_at' => fake()->dateTimeBetween('-1 month'),
        ];

        if (rand(0, 1) == 1) {            // case A: if the random number is equal 1
            $commentArray['user_id'] = User::inRandomOrder()->first(); //query the user table to find an id to add it to the comment
        } else {            // case B: if the random number 0
            $commentArray['pseudo'] = fake()->name();
            $commentArray['email'] = fake()->safeEmail();
        }

        return $commentArray;
    }
}
