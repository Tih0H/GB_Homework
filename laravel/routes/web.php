<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoriesController;
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

Route::get('/info', static function () {
    return view('info');
})->name('info');

Route::get('/news/{id}/show', [NewsController::class, 'show'])->where('id','\d+')->name('news.show');


Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');

Route::get('/categories/{id}/show',[CategoriesController::class,'show'])->where('id','\d+')->name('categories.show');
