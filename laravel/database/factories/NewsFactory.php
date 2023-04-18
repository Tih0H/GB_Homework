<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition():array
    {
        return [
            'title'=>\fake()->jobTitle(),
            'author'=>\fake()->userName(),
            'description'=>\fake()->text(200),
            'status'=>'draft',
            'source_id'=>1,
            'image'=>\fake()->imageUrl()
        ];
    }
}
