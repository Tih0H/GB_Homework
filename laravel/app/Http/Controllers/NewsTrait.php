<?php

namespace App\Http\Controllers;


trait NewsTrait
{
    use CategoryTrait;

    public function getNews(int $id = null): array
    {
        $news = [];
        $quantityNews = 10;
        $categoriesNews = [];
        $categoriesNews = $this->getCategories();

        if ($id === null) {
            for ($i = 0; $i <= $quantityNews; $i++) {
                $news[$i] = [
                    'id' => $i,
                    'category' => $categoriesNews[\fake()->numberBetween(1, \count($categoriesNews))],
                    'title' => \fake()->jobTitle(),
                    'description' => \fake()->text(100),
                    'author' => \fake()->userName(),
                    'created_at' => \now()->format('d-m-Y-H-i')
                ];

            };
            return $news;
        }

        return [
            'id' => $id,
            'category' => $categoriesNews[\fake()->numberBetween(1, \count($categoriesNews))],
            'title' => \fake()->jobTitle(),
            'description' => \fake()->text(100),
            'author' => \fake()->userName(),
            'created_at' => \now()->format('d-m-Y-H-i')
        ];
    }
}
