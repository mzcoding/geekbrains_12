<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
	{
		return view('news.index', [
			'newsList' => News::all(),
		]);
	}

	public function show(News $news)
	{
		dd($news);
		return view('news.show', [
			'news' => $news,
		]);
	}
}
