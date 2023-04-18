<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class FeedbackControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('feedback.index'));

        $response->assertStatus(200);
    }
    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('feedback.create'));

        $response->assertStatus(200);
    }

    public function testCreateSaveErrorData(): void
    {
        $data = [
            'author' => \fake()->userName(),
            'feedback'=>\fake()->text(100),
        ];
        $response = $this->post(route('feedback.store'), $data);

        $response->assertStatus(500);
    }

    public function testValidateTitleData(): void
    {
        $data = [];
        $response = $this->post(route('feedback.store'), $data);
        $response->assertRedirect('http://localhost');
    }
    public function testHeadersNoCors(): void
    {
        $data = [
            'author' => \fake()->userName(),
            'feedback'=>\fake()->text(100),
        ];
        $response = $this->post(route('feedback.store'), $data);

        $response->assertHeaderMissing('Access-Control-Allow-Origin');
    }
}
