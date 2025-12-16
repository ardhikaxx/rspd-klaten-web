<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManajemenBeritaController;
use App\Http\Controllers\SettingsController;

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
    
    // Settings Routes
    Route::get('/admin/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/admin/settings/profile', [SettingsController::class, 'updateProfile'])->name('settings.update-profile');
    Route::post('/admin/settings/password', [SettingsController::class, 'updatePassword'])->name('settings.update-password');
    Route::post('/admin/settings', [SettingsController::class, 'store'])->name('settings.store');
    Route::delete('/admin/settings/{id}', [SettingsController::class, 'destroy'])->name('settings.destroy');
});

Route::fallback(function () {
    return redirect()->route('login');
});