<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManajemenBeritaController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
    // Berita Routes
    Route::get('/admin/berita', [ManajemenBeritaController::class, 'index'])->name('berita.index');
    Route::post('/admin/berita', [ManajemenBeritaController::class, 'store'])->name('berita.store');
    Route::get('/admin/berita/{id}', [ManajemenBeritaController::class, 'show']);
    Route::post('/admin/berita/{id}', [ManajemenBeritaController::class, 'update']);
    Route::delete('/admin/berita/{id}', [ManajemenBeritaController::class, 'destroy']);
});

Route::fallback(function () {
    return redirect()->route('login');
});