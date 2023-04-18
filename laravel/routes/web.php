<?php

use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

Route::group(['middleware' => 'auth'], static function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');
    Route::get('/account', AccountController::class)->name('account');


    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is.admin'], static function () {
        Route::get('/', AdminController::class)->name('index');
        Route::resource('news', AdminNewsController::class);
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('sources', AdminSourceController::class);
        Route::resource('feedbacks', AdminFeedbackController::class);
        Route::resource('orders', AdminOrderController::class);
        Route::resource('users', AdminUserController::class);
        Route::get('parse',\App\Http\Controllers\Admin\ParserController::class);
    });
});


Route::group(['prefix' => ''], static function () {
    Route::resource('feedbacks', FeedbackController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('news', NewsController::class);
    Route::resource('categories', CategoriesController::class);
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/redis',[\App\Http\Controllers\Redis\RedisController::class,'index']);

Route::group(['middleware'=>'guest'], function(){
    Route::get('/auth/redirect/{driver}', [\App\Http\Controllers\SocialProvidersController::class, 'redirect'])->where('driver','\w+')->name('social.auth.redirect');
    Route::get('/auth/callback/{driver}', [\App\Http\Controllers\SocialProvidersController::class, 'callback'])->where('driver','\w+');

});


