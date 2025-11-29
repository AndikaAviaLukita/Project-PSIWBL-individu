<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminTaskController;
use App\Http\Controllers\UserTaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// --- RUTE ADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminTaskController::class, 'index'])->name('dashboard');
    Route::get('/tasks/create', [AdminTaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [AdminTaskController::class, 'store'])->name('tasks.store');
    
    // Nanti kita tambah Edit/Delete disini
});

// --- RUTE USER
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserTaskController::class, 'index'])->name('dashboard');
    Route::patch('/tasks/{task}/update-status', [UserTaskController::class, 'updateStatus'])->name('tasks.update-status');
});

// --- RUTE PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';