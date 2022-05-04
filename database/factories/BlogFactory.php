<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text(60),
            'body' => $this->faker->text,
            'image' => '/images/resumes/baranaapp.com_.png',
            'user_id' => 1,
            'viewCount' => $this->faker->randomNumber(3),
            'likeCount' => $this->faker->randomNumber(2),
            'commentCount' => $this->faker->randomNumber(1),
        ];
    }
}
