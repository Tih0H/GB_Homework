<?php
declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\News;
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
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus():void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessData():void
    {
        $news = News::factory()->create();

        $response = $this->post(route('admin.news.store'), $news);

        $response->assertStatus(200);
    }

    public function testValidateTitleData():void
    {
        $data = [
            'author' => \fake()->userName(),
            'description' => \fake()->text(100)
        ];
        $response = $this->post(route('admin.news.store'), $data);
        $response->assertRedirect('http://localhost');
    }
    public function testHeadersNoCors(): void
    {
        $data = [
            'title' => \fake()->jobTitle(),
            'author' => \fake()->userName(),
            'description' => \fake()->text(100)
        ];
        $response = $this->post(route('admin.categories.store'), $data);

        $response->assertHeaderMissing('Access-Control-Allow-Origin');
    }
}
