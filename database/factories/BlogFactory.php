<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(6, 8));

        return [
            'title' => $title,
            'article' => fake()->paragraphs(5, true),
            'slug' => Str::slug($title),
            'user_id' => User::factory(),
            'category_id' => Category::pluck('id')->random(),
        ];
    }
}
