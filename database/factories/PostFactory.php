<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = fake()->sentence();
        return [
            'cover_image' => fake()->imageUrl($width = 800, $height = 600),
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => fake()->paragraph(6),
            'category_id' => 1,
            'user_id' => 1,
            'featured' => 0,
            'published_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
