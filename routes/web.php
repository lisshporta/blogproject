<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminPostController;




Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class); 

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::middleware('admin')->group(function () {
Route::post('dashboard/posts', [AdminPostController::class, 'store']);
Route::get('dashboard/posts/create', [AdminPostController::class, 'create']);
Route::get('dashboard/posts/', [AdminPostController::class, 'index']);
Route::get('dashboard/posts/{post}/edit', [AdminPostController::class, 'edit']);
Route::patch('dashboard/posts/{post}', [AdminPostController::class, 'update']);
Route::delete('dashboard/posts/{post}', [AdminPostController::class, 'destroy']);

Route::get('dashboard/create-category', [CategoryController::class, 'create']);
Route::post('dashboard/category', [CategoryController::class, 'store']);

});
