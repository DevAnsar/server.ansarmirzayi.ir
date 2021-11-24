<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ResumeFactory extends Factory
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
            'description' => $this->faker->text,
            'url' => 'http://baranaapp.com',
            'domain' => $this->faker->domainName, // password
            'image' => '/images/resumes/baranaapp.com_.png',
            'queue' => $this->faker->randomDigit(),
        ];
    }
}
