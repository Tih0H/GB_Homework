<?php

namespace Database\Seeders;

use App\Enums\NewsSource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('sources')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $data[]=['name' => \fake()->jobTitle(),
            'source_url' => NewsSource::RAMBLER->value,
            'created_at' => \now(),
            'updated_at' => \now()
        ];
        $data[]=['name' => \fake()->jobTitle(),
            'source_url' => NewsSource::MAIL->value,
            'created_at' => \now(),
            'updated_at' => \now()
        ];
        return $data;
    }
}
