<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Jobs\NewsJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
		$links = [
			'https://news.yandex.ru/auto.rss',
			'https://news.yandex.ru/auto_racing.rss',
			'https://news.yandex.ru/army.rss',
			'https://news.yandex.ru/gadgets.rss',
			'https://news.yandex.ru/index.rss',
			'https://news.yandex.ru/martial_arts.rss',
			'https://news.yandex.ru/communal.rss',
			'https://news.yandex.ru/health.rss',
			'https://news.yandex.ru/games.rss',
			'https://news.yandex.ru/internet.rss',
			'https://news.yandex.ru/cyber_sport.rss',
			'https://news.yandex.ru/movies.rss',
			'https://news.yandex.ru/cosmos.rss',
			'https://news.yandex.ru/culture.rss',
			'https://news.yandex.ru/fire.rss',
		];

		foreach($links as $link) {
			dispatch(new NewsJob($link));
		}

		echo "Спасибо, парсинг";
    }
}
