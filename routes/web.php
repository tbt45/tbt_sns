<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
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
});
Route::get('article/show/{article}', [ArticleController::class, 'show'])->name('articles.show');

// ユーザー情報を表示する。
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', [UserController::class, 'show'])->name('show');
    Route::post('/{name}', [UserController::class, 'show'])->name('show');
});
// ユーザー情報を編集する。
Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::patch('/update/{user}', [UserController::class, 'update'])->name('update');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Auth::routes();
