<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('feedbacks')->insert($this->getData());

    }
    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = ['author' => \fake()->userName(),
                'feedback' => \fake()->text(200),
                'created_at' => \now(),
                'updated_at' => \now()
            ];
        }
        return $data;
    }
}
