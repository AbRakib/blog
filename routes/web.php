<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
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

Route::get( '/', function () {
    $posts = Post::latest()->get();
    $categories = Category::latest()->get();
    return view( 'components.layout', compact( 'posts', 'categories' ) );
} )->name( 'home' );

Route::get( '/post/{slug}', [PostController::class, 'show'] )->name( 'post' );
Route::get( '/category/{slug}', [CategoryController::class, 'show'] )->name( 'category' );
