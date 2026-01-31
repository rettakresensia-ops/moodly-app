<?php

use App\Http\Controllers\MoodController;
use App\Http\Controllers\ProfileController; // Tambahkan ini!
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Moodly & Profile dalam satu grup Auth
Route::middleware(['auth', 'verified'])->group(function () {
    
    // --- FITUR MOODLY ANDA ---
    Route::get('/dashboard', [MoodController::class, 'index'])->name('dashboard');
    Route::get('/mood/create', [MoodController::class, 'create'])->name('mood.create');
    Route::post('/mood/store', [MoodController::class, 'store'])->name('mood.store');
    Route::get('/mood/history', [MoodController::class, 'history'])->name('mood.history');

    // --- FITUR PROFILE (Tambahkan ini agar error hilang) ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';