<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



	public function getNews(): array
	{
		$faker = Factory::create();
		$data = [];
		for($i=1; $i<10; $i++) {
			$data[] = [
				'id' => $i,
				'title' => $faker->jobTitle(),
				'author' => $faker->userName(),
				'image' => null,
				'description' => "<strong>" . $faker->sentence(10) . "</strong>"
			];
		}

		return $data;
	}
}
