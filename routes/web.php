<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\AdminSectionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/tutorials/react-for-beginners', function () {
    return view('frontend.blog-details');
})->name('tutorials.react-for-beginners');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::prefix('admin')->name('admin.')->group(function (): void {

    // Guest Routes
    Route::middleware('guest')->group(function (): void {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'authenticate'])->name('login.store');
        Route::get('/register', [AuthController::class, 'register'])->name('register');
        Route::post('/register', [AuthController::class, 'store'])->name('register.store');
    });

    // Authenticated Routes
    Route::middleware('auth')->group(function (): void {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('categories', CategoryController::class);
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        Route::resource('tags', TagController::class);
        Route::get('/tags', [TagController::class, 'index'])->name('tags');

        foreach (config('admin_menu.items') as $menuItem) {
            if (! isset($menuItem['path'])) {
                continue;
            }

            if (in_array($menuItem['path'], ['categories', 'tags'], true)) {
                continue;
            }

            Route::get('/'.$menuItem['path'], AdminSectionController::class)
                ->defaults('section', $menuItem['path'])
                ->name(str_replace('admin.', '', $menuItem['route']));
        }
    });

});
