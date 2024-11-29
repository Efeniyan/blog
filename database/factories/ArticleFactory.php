<?php

namespace Database\Factories;

use App\Models\Article;
use Alirezasedghi\LaravelImageFaker\ImageFaker;
use Alirezasedghi\LaravelImageFaker\Services\Picsum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imageFaker = new ImageFaker(new Picsum());
        return [
         
            'title' => fake()->sentence(15), // on veut 15 mots
            'body' => fake()->paragraph(50), // on veut 50 phrases
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'image' => $imageFaker->image(public_path("images")) 
           
        ];
    }
}