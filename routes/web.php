<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
})->name('home');


Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');

    Route::prefix('tasks')->name('tasks.')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('index');
        Route::post('/store', [TaskController::class, 'store'])->name('store');

        Route::get('{task}/show', [TaskController::class, 'show'])->name('show');
        Route::get('{task}/edit', [TaskController::class, 'edit'])->name('edit');
        Route::put('{task}/update', [TaskController::class, 'update'])->name('update');
        Route::delete('{task}/destroy', [TaskController::class, 'destroy'])->name('destroy');
        Route::get('/tasks/{task}/download', [TaskController::class, 'download'])->name('download');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
