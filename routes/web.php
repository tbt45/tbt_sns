<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RetweetController;
use Illuminate\Support\Facades\Auth;


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

Route::middleware('auth')->group(function () {
    Route::get('article/index', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('article/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('article/store', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('article/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('article/update/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::patch('article/update/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('article/delete/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    // いいね機能
    Route::get('article/like/{id}', [ArticleController::class, 'like'])->name('articles.like');
    Route::get('article/unlike/{id}', [ArticleController::class, 'unlike'])->name('articles.unlike');
    //リツイート機能
    Route::get('article/retweet/{id}', [RetweetController::class, 'retweet'])->name('articles.retweet');
    Route::get('article/unretweet/{id}', [RetweetController::class, 'unretweet'])->name('articles.unretweet');

    //フォローしたユーザーの投稿を表示
    Route::get('article/timeline', [ArticleController::class, 'timeline'])->name('articles.timeline');
});
Route::get('article/show/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::prefix('users')->name('users.')->group(function () {
    // ユーザー情報を表示する。
    Route::get('/{name}', [UserController::class, 'show'])->name('show');
    Route::post('/{name}', [UserController::class, 'show'])->name('show');
    //フォロー、フォロワーを表示
    Route::get('/{name}/follows', [FollowController::class, 'follows'])->name('follows');
    Route::get('/{name}/followers', [FollowController::class, 'followers'])->name('followers');
    //いいねした記事を表示
    Route::get('/{name}/likes', [LikeController::class, 'likes'])->name('likes');
});
// ユーザー情報を編集する。
Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::patch('/{user}/update', [UserController::class, 'update'])->name('update');
});
// ユーザー情報を表示する。
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', [UserController::class, 'show'])->name('show');
    Route::post('/{name}', [UserController::class, 'show'])->name('show');
});
// フォロー、フォロー解除。
Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::post('/{id}/follow', [FollowController::class, 'follow'])->name('follow');
    Route::delete('/{id}/unfollow', [FollowController::class, 'unfollow'])->name('unfollow');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Auth::routes();
