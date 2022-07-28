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
        /*
         * return [
         *     'content' => fake()->text(2000),
         *     'pseudo' => fake()->name(),
         *     'email' => fake()->safeEmail(),
         *     'post_id' => Post::inRandomOrder()->first(),  //query the post table to find an id to add it to the comment
         *     'user_id' => User::inRandomOrder()->first(),  //query the user table to find an id to add it to the comment
         *
         * ];
         */

        // Refactor

        $commentArray = [
            'post_id' => Post::inRandomOrder()->first(),  //query the post table to find an id to add it to the comment
            'content' => fake()->text(2000),
        ];

            /* how to manage the 2 possibles cases in random way:
             * A/ user non authentified
             * B/ user authentified
             */

        $randomNumber = rand(0,1);

        if( $randomNumber <= 0.3 ) {            // case A: if the random number is higher or equal than 0.3

            $commentArray['user_id'] = User::inRandomOrder()->first(); //query the user table to find an id to add it to the comment

        } else {            // case B: if the random number is higher than 0.3
            $commentArray['pseudo'] = fake()->name();
            $commentArray['email'] = fake()->safeEmail();
        }

        return $commentArray;
    }
}
