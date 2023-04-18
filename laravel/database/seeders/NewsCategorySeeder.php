<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('category_has_news')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 300; $i++) {
            $data[] = ['news_id' => \fake()->numberBetween(1,100),
                'category_id' => \fake()->numberBetween(1,10),
                'created_at' => \now(),
                'updated_at' => \now()
            ];
        }
        return $data;
    }
}
