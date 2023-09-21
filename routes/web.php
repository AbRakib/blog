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
});
