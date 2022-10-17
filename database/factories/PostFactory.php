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
            'user_id'=>User::factory(),
            'category_id'=>1,
            'title'=>fake()->sentence(3),
            'slug'=>fake()->slug(3),
            'summary' => collect(fake()->paragraphs(2))->map(fn($item) => "<p>{$item}</p>")->implode(''),
            'body'=>collect(fake()->paragraphs(6))->map(fn($item) => "<p>{$item}</p>")->implode(''),
        ];
    }
}
