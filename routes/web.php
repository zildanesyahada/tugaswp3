<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return redirect()->route('backend.beranda');
});

// Rute untuk halaman beranda
Route::get('backend/beranda', [BerandaController::class, 'berandaBackend'])
    ->name('backend.beranda')
    ->middleware('auth');
Route::get('backend/login', [LoginController::class, 'loginBackend'])->name('backend.login');
Route::post('backend/login', [LoginController::class, 'authenticateBackend'])->name('backend.login.post');
Route::post('backend/logout', [LoginController::class, 'logoutBackend'])->name('backend.logout');
//Route::get('backend/register', [RegisterController::class, 'registerBackend'])->name('backend.register');
Route::get('backend/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('backend/register', [RegisterController::class, 'register']);

