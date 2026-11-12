<?php

namespace Database\Seeders;

// use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories = collect(['Business', 'Sports', 'Technology', 'Entertainment', 'Lifestyle'])
            ->map(fn(string $name) => Category::factory()->create(['name' => $name]));

        Article::factory()
            ->count(20)
            ->state(function () use ($categories) {
                return [
                    'category_id' => $categories->random()->id,
                ];
            })
            ->create();
    }
}
