<?php

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminWritersController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PostController::class, 'index']);

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('signin', [SessionsController::class, 'create'])->middleware('guest');
Route::post('signin', [SessionsController::class, 'store'])->middleware('guest');

Route::post('signout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::middleware('can:admin')->group(function () {
    // Route::resource('admin/posts', AdminPostController::class)->except('show');
    Route::get('admin/posts', [AdminPostController::class, 'index']);
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::get('admin/posts/create', [AdminPostController::class, 'create']);
    Route::post('admin/posts', [AdminPostController::class, 'store']);
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);

    Route::resource('admin/categories', AdminCategoriesController::class)->except('show');

    Route::resource('admin/writers', AdminWritersController::class)->except('show');
});
