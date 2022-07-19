<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReplyController;
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

Route::prefix('article')->name('articles.')->middleware('auth')->group(function () {
    Route::get('/index', [ArticleController::class, 'index'])->name('index');
    Route::get('/create', [ArticleController::class, 'create'])->name('create');
    Route::post('/store', [ArticleController::class, 'store'])->name('store');
    Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('edit');
    Route::put('/update/{article}', [ArticleController::class, 'update'])->name('update');
    Route::patch('/update/{article}', [ArticleController::class, 'update'])->name('update');
    Route::delete('/delete/{article}', [ArticleController::class, 'destroy'])->name('destroy');
    // いいね機能
    Route::get('/like/{id}', [ArticleController::class, 'like'])->name('like');
    Route::get('/unlike/{id}', [ArticleController::class, 'unlike'])->name('unlike');
    //フォローしたユーザーの投稿を表示
    Route::get('timeline', [ArticleController::class, 'timeline'])->name('timeline');
});
Route::get('article/show/{article}', [ArticleController::class, 'show'])->name('articles.show');
// 返信機能
Route::prefix('replies')->name('replies.')->middleware('auth')->group(function () {
    Route::get('/create/{article}', [ReplyController::class, 'create'])->name('create');
    Route::post('/store', [ReplyController::class, 'store'])->name('store');
    Route::delete('/delete/{reply}', [ReplyController::class, 'destroy'])->name('destroy');
});
Route::get('/replies/{name}', [ReplyController::class, 'show'])->name('replies.show');
// ユーザー情報
Route::prefix('users')->name('users.')->group(function () {
    // ユーザー情報を表示する。
    Route::get('/{name}', [UserController::class, 'show'])->name('show');
    Route::post('/{name}', [UserController::class, 'show'])->name('show');
    //フォロー、フォロワーを表示
    Route::get('/{name}/follows', [FollowController::class, 'follows'])->name('follows');
    Route::get('/{name}/followers', [FollowController::class, 'followers'])->name('followers');
    //いいねした記事を表示
    Route::get('/{name}/likes', [LikeController::class, 'likes'])->name('likes');
    // 返信した記事を表示
    Route::get('/{name}/replies', [ReplyController::class, 'replies'])->name('replies');
});
// ユーザー情報を編集する。
Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::patch('/{user}/update', [UserController::class, 'update'])->name('update');
});
// フォロー、フォロー解除。
Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::post('/{id}/follow', [FollowController::class, 'follow'])->name('follow');
    Route::delete('/{id}/unfollow', [FollowController::class, 'unfollow'])->name('unfollow');
});

require __DIR__ . '/auth.php';

Auth::routes();
