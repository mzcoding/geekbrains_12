<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function index()
    {
		$categories = Category::with('news')->paginate(10);

        return view('admin.categories.index', [
			'categories' => $categories
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(Request $request)
    {
		//validation here

		$category = Category::create(
			$request->only(['title', 'description'])
		);

		if($category) {
			return redirect()
				->route('admin.categories.index')
				->with('success', 'Категория успешно добавлена');
		}

		return back()->with('error', 'Категория не добавилась');
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
	 * @param Category $category
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function edit(Category $category)
    {
		return view('admin.categories.edit', [
			'category' => $category
		]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param Category $category
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(Request $request, Category $category)
    {
		//validation here

		$category->title = $request->input('title');
		$category->description = $request->input('description');

		if($category->save()) {
			return redirect()
				->route('admin.categories.index')
				->with('success', 'Категория успешно обновлена');
		}

		return back()->with('error', 'Категория не обновилась');

    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Category $category
	 * @return \Illuminate\Http\Response
	 */
    public function destroy(Category $category)
    {
        //
    }
}
