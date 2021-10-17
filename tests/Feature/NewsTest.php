<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_news_create_form()
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

	public function test_show_news()
	{
		$response = $this->get(route('news.show', ['id' => mt_rand(1,7)]));

		$response->assertStatus(200);
	}

	public function test_show_news_as_not_found_status()
	{
		$response = $this->get(route('news.show', ['id' => mt_rand(10000, 19999999)]));

		$response->assertStatus(404);
	}

	public function test_has_json_structure()
	{
		$response = $this->get(route('admin.index'));
		$response->assertStatus(200);
		$response->assertJson(['name' => 1, 'age' => 2]);

	}
}
