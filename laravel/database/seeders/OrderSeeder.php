<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('orders')->insert($this->getData());

    }
    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = ['name' => \fake()->userName(),
                'phone' => \fake()->phoneNumber(),
                'email' => \fake()->email(),
                'info' => \fake()->text(200),
                'created_at' => \now(),
                'updated_at' => \now()
            ];
        }
        return $data;
    }
}
