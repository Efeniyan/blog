<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => fake()->text(50),
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'article_id' => function () {
                return Article::inRandomOrder()->first()->id;
            },
        ];
        // return [
        //     'comment' => $this->faker->text(50),
        //     'user_id' => 1,
        //     'article_id' => 3,
        // ];
    }
}
