<?php

use App\Http\Controllers\MoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard & Riwayat (karena satu halaman)
    Route::get('/dashboard', [MoodController::class, 'index'])->name('dashboard');
    Route::get('/moods', [MoodController::class, 'index'])->name('moods.index');
    
    // Simpan Mood
    Route::post('/moods', [MoodController::class, 'store'])->name('moods.store');
});

require __DIR__.'/auth.php';