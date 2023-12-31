<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get( '/', [PostController::class, 'index'] )->name( 'home' );
Route::get( '/post/{slug}', [PostController::class, 'show'] )->name( 'post' );
Route::post( '/post/{post:slug}/comment', [PostCommentController::class, 'store'] )->name( 'comment.store' );
Route::get( '/category/{slug}', [CategoryController::class, 'show'] )->name( 'category' );
Route::get( '/author/{slug}', [UserController::class, 'show'] )->name( 'author' );

Route::middleware(['guest'])->group(function () {
    Route::get( '/login', [AuthController::class, 'login'] )->name( 'login' );
    Route::post( '/check/login', [AuthController::class, 'checklogin'] )->name( 'check.login' );
    Route::get( '/register', [AuthController::class, 'index'] )->name( 'register' );
    Route::post( '/register/store', [AuthController::class, 'store'] )->name( 'user.store' );
});

Route::middleware(['auth'])->group(function() {
    Route::post( '/logout', [AuthController::class, 'logout'] )->name( 'logout' );
});

Route::post( '/newsletter', [NewsletterController::class, 'store'] )->name( 'newsletter' );

// admin section route
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // post create/store/update/delete
    Route::get('/posts', [PostController::class, 'posts'])->name('admin.posts');
    Route::get('/post-add', [PostController::class, 'create'])->name('admin.post.add');
    Route::post('/post-store', [PostController::class, 'store'])->name('admin.post.store');
    Route::post('/post-update/{id}', [PostController::class, 'update'])->name('admin.post.update');
    Route::get('/post-view/{slug}', [PostController::class, 'post'])->name('admin.post.view');
    Route::get('/post-edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
    Route::post('/post-delete/{id}', [PostController::class, 'destroy'])->name('admin.post.delete');

    // category create/edit/update/delete/store
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/category-add', [CategoryController::class, 'create'])->name('admin.category.add');
    Route::post('/category-store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::post('/category-update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    // Route::get('/category-view/{slug}', [CategoryController::class, 'post'])->name('admin.category.view');
    Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category-delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
});
