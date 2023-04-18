<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('order.index'));

        $response->assertStatus(200);
    }
    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('order.create'));

        $response->assertStatus(200);
    }

    public function testCreateSaveErrorData(): void
    {
        $data = [
            'name' => \fake()->userName(),
            'phone' => \fake()->phoneNumber(),
            'email' => \fake()->email(),
            'info' => \fake()->text(100),
        ];
        $response = $this->post(route('order.store'), $data);

        $response->assertStatus(500);
    }

    public function testValidateTitleData(): void
    {
        $data = [];
        $response = $this->post(route('order.store'), $data);
        $response->assertRedirect('http://localhost');
    }
    public function testHeadersNoCors(): void
    {
        $data = [
            'name' => \fake()->userName(),
            'phone' => \fake()->phoneNumber(),
            'email' => \fake()->email(),
            'info' => \fake()->text(100),
        ];
        $response = $this->post(route('order.store'), $data);

        $response->assertHeaderMissing('Access-Control-Allow-Origin');
    }
}
