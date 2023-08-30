<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class)->names('admin.categories');

});

/// Unauthenticated
Route::get('/',[PostController::class, 'list'])->name('posts.list');

Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');

Route::get('/posts/category/{category}',[PostController::class, 'getByCategory'])->name('posts.category');

Route::get('/posts/tag/{tag}',[PostController::class, 'getByTag'])->name('posts.tag');