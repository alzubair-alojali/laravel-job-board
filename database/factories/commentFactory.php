<?php

namespace Database\Factories;

use App\Models\comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class commentFactory extends Factory
{
    protected $model = comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::factory(),
            'author' => $this->faker->name ,
            'content' => $this->faker->sentence()
        ];
    }
}