<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessData(): void
    {
        $data = [
            'name' => \fake()->jobTitle()
        ];
        $response = $this->post(route('admin.categories.store'), $data);

        $response->assertStatus(200)->assertJson($data);
    }

    public function testValidateTitleData(): void
    {
        $data = [];
        $response = $this->post(route('admin.categories.store'), $data);
        $response->assertRedirect('http://localhost');
    }
    public function testHeadersNoCors(): void
    {
        $data = [
            'name' => \fake()->jobTitle()
        ];
        $response = $this->post(route('admin.categories.store'), $data);

        $response->assertHeaderMissing('Access-Control-Allow-Origin');
    }
}
