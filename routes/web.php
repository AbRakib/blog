<?php

use App\Http\Controllers\AuthController;
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

Route::get( '/', [PostController::class, 'index'] )->name( 'home' );
Route::get( '/post/{slug}', [PostController::class, 'show'] )->name( 'post' );
Route::get( '/category/{slug}', [CategoryController::class, 'show'] )->name( 'category' );
Route::get( '/author/{slug}', [UserController::class, 'show'] )->name( 'author' );

Route::get( '/login', [AuthController::class, 'login'] )->name( 'login' )->middleware('guest');
Route::post( '/check/login', [AuthController::class, 'checklogin'] )->name( 'check.login' )->middleware('guest');
Route::get( '/register', [AuthController::class, 'index'] )->name( 'register' )->middleware('guest');
Route::post( '/register/store', [AuthController::class, 'store'] )->name( 'user.store' )->middleware('guest');
Route::post( '/logout', [AuthController::class, 'logout'] )->name( 'logout' )->middleware('auth');
