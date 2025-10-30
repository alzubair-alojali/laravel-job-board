<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use Str;

class postFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=> Str::uuid()->toString(),
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph(3, true),
            'author' => $this->faker->name,
            'published' => $this->faker->boolean,
        ];
    }
}