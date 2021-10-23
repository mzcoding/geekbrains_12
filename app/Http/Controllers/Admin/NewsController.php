<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function index()
    {
		$news = News::paginate(10);

        return view('admin.news.index', [
			'newsList' => $news
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function create()
    {
		$categories = Category::all();
		return view('admin.news.create', [
			'categories' => $categories
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(Request $request)
    {
		$request->validate([
			'title' => ['required', 'string']
		]);

        $news = News::create(
			$request->only(['category_id', 'title', 'description', 'status', 'author'])
		);

		if($news) {
			return redirect()
				->route('admin.news.index')
				->with('success', 'Новость успешно добавлена');
		}

		return back()->with('error', 'Новость не добавилась');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param News $news
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function edit(News $news)
    {
		$categories = Category::all();
		return view('admin.news.edit', [
			'news' => $news,
			'categories' => $categories
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(Request $request, News $news)
    {
		$news = $news->fill(
			$request->only(['category_id', 'title', 'description', 'status', 'author'])
		)->save();

		if($news) {
			return redirect()
				->route('admin.news.index')
				->with('success', 'Новость успешно обновлена');
		}

		return back()->with('error', 'Новость не обновилась');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
