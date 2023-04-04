<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus():void
    {
        $response = $this->get(route('categories'));

        $response->assertStatus(200);
    }

    public function testShowIdSuccessStatus():void
    {
        $response = $this->get(route('categories.show',['id'=>5]));

        $response->assertStatus(200);
    }
}
