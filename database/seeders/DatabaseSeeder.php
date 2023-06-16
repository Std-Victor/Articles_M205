<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory(4)->create();
        User::factory(7)
            ->create()
            ->each(function ($user) use ($categories) {
                Article::factory(3)->create([
                'user_id' => $user->id,
                'category_id' => $categories->random()->id,
                    ])->each(function ($article) use ($user) {
                        Comment::factory(5)
                            ->create([
                                'user_id' => $user->id,
                                'article_id' => $article->id,
                                ]);
            });
        });
    }
}
