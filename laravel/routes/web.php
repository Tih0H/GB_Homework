<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\IndexController as AdminController;
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

Route::get('/', static function () {
    return view('welcome');
})->name('main');

Route::get('/news/{id}/show', [NewsController::class, 'show'])->where('id','\d+')->name('news.show');


Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');

Route::get('/categories/{id}/show',[CategoriesController::class,'show'])->where('id','\d+')->name('categories.show');

Route::group(['prefix'=>'admin'], static function(){
    Route::get('/', AdminController::class)->name('admin.index');
});
