<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'id' => 1,
                'title' => 'First Article',
                'content' => 'This is the content of the first article',
            ],
            [
                'id' => 2,
                'title' => 'Second Article',
                'content' => 'This is the content of the second article',
            ],
            [
                'id' => 3,
                'title' => 'Third Article',
                'content' => 'This is the content of the third article',
            ],
            [
                'id' => 4,
                'title' => 'Fourth Article',
                'content' => 'This is the content of the four article',
            ],
            [
                'id' => 5,
                'title' => 'Five Article',
                'content' => 'This is the content of the five article',
            ],
        ];

        foreach($articles as $article)
        {
            Article::create($article);
        }
    }
}
