<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\EditNewsRequest;
use App\Models\Category;
use App\Models\News;


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
	 * @param CreateNewsRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(CreateNewsRequest $request)
    {
		$news = News::create($request->validated());

		if($news) {
			return redirect()
				->route('admin.news.index')
				->with('success', __('messages.admin.news.store.success'));
		}

		return back()->with('error', __('messages.admin.news.store.fail'));
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
	 * @param EditNewsRequest $request
	 * @param News $news
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(EditNewsRequest $request, News $news)
    {
		$news = $news->fill($request->validated())->save();

		if($news) {
			return redirect()
				->route('admin.news.index')
				->with('success', __('messages.admin.news.update.success'));
		}

		return back()->with('error', __('messages.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
	 */
    public function destroy(News $news)
    {
        try{
			$news->delete();

			return response()->json(['success' => true]);
		}catch (\Exception $e) {
			\Log::error($e->getMessage() . PHP_EOL, $e->getTrace());

			return response()->json(['success' => false]);
		}
    }
}
