<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\BlogDashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/blogs', [BlogController::class, 'showBlogs'])->name('blogs');
Route::get('/single/{slug}', [BlogController::class, 'singleBlog']);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [BlogDashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/dashboard/create', [BlogDashboardController::class, 'create']);
    Route::post('/dashboard/create', [BlogDashboardController::class, 'store']);

    Route::delete('/dashboard/{blog:slug}', [BlogDashboardController::class, 'destroy']);

    Route::get('/dashboard/{blog:slug}/edit', [BlogDashboardController::class, 'edit']);
    Route::patch('/dashboard/{blog:slug}/update', [BlogDashboardController::class, 'update']);

    Route::get('/dashboard/{blogs:slug}', [BlogDashboardController::class, 'show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/upload', [ProfileController::class, 'upload']);
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
