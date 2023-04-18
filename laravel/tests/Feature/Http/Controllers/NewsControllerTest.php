<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus():void
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
    }

    public function testShowIdSuccessStatus():void
    {
        $response = $this->get(route('news.show',['news'=>News::create()]));

        $response->assertStatus(200);
    }
}
