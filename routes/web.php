<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ PostController::class, 'index'])->name('home');
Route::get( '/post/{slug}', [PostController::class, 'show'] )->name( 'post' );
Route::get( '/category/{slug}', [CategoryController::class, 'show'] )->name( 'category' );
Route::get('/author/{slug}', [UserController::class, 'show'])->name('author');

