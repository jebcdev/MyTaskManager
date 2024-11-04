<?php

use App\Http\Controllers\_SiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

Route::get('/', _SiteController::class)->name('index');


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [_SiteController::class, 'admin'])->name('admin.index');
});

Route::middleware('auth')->group(function () {
    Route::resource('/statuses', StatusController::class)->names('statuses');
    Route::resource('/categories', CategoryController::class)->names('categories');
});














/* Auth System Routes */
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [_SiteController::class, 'dashboard'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
