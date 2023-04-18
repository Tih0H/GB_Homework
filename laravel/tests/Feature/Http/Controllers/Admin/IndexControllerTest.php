<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus():void
    {
        $response = $this->get(route('admin.admin.index'));

        $response->assertStatus(200);
    }
    public function testViewSuccessStatus():void
    {
        $response = $this->get(route('admin.admin.index'));

        $response->assertViewIs('admin.index');
    }
}
