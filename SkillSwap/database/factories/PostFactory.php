<?php

namespace Database\Factories;

use App\Models\Catergories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'image' => fake()->imageUrl(),
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'content' => fake()->paragraphs(3, true),
            'catergory_id' => Catergories::inRandomOrder()->first()->id,
            'user_id' => 1,
            'published_at' => fake()->optional()->dateTime(),
        ];
    }
}
