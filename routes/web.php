<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
	  Route::get('/', AdminController::class)
		  ->name('index');
	  Route::resource('/categories', AdminCategoryController::class);
      Route::resource('/news', AdminNewsController::class);
});

Route::get('/news', [NewsController::class, 'index'])
	->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])
	->where('news', '\d+')
	->name('news.show');

Route::get('collection', function() {
	$names = ['Ann', 'Bet', 'Luck', 'Lucy', 'Ben', 'Bob', 'Ia', 'Yan'];
	$collection = collect($names);
});