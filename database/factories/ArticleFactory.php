<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6);

        return [
            'category_id'  => Category::factory(),
            'title'        => $title,
            'summary'      => fake()->sentence(18),
            'body'         => fake()->paragraphs(5, true),
            'permalink'    => Str::slug($title) . '-' . Str::lower(Str::random(5)),
            'author'       => fake()->name(),
            'status'       => 'published',
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }

    public function draft(): static
    {
        return $this->state(['status' => 'draft', 'published_at' => null]);
    }
}
