<?php

use App\Http\Controllers\_SiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', _SiteController::class)->name('index');


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [_SiteController::class, 'admin'])->name('admin.index');
});

Route::middleware('auth')->group(function () {

    /* Proteger estas rutas para los admins */

    Route::resource('/statuses', StatusController::class)->names('statuses');

    Route::resource('/categories', CategoryController::class)->names('categories');
    /* Proteger estas rutas para los admins */

    /* Rutas de las tareas */
    Route::resource('/tasks', TaskController::class)->names('tasks');
    /* Rutas de las tareas */

    /* Rutas de las notas */
    Route::resource('/notes', NoteController::class)->names('notes');
    /* Rutas de las notas */
});














/* Auth System Routes */
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [_SiteController::class, 'dashboard'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
