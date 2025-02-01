<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontestanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/kontestans', [KontestanController::class, 'adminIndex'])->name('admin.kontestans.index');
    Route::get('/admin/kontestans/create', [KontestanController::class, 'create'])->name('admin.kontestans.create');
    Route::post('/admin/kontestans', [KontestanController::class, 'store'])->name('admin.kontestans.store');
    Route::get('/admin/kontestans/{kontestan}/edit', [KontestanController::class, 'edit'])->name('admin.kontestans.edit');
    Route::put('/admin/kontestans/{kontestan}', [KontestanController::class, 'update'])->name('admin.kontestans.update');
    Route::delete('/admin/kontestans/{kontestan}', [KontestanController::class, 'destroy'])->name('admin.kontestans.destroy');
    Route::get('/admin/voting-data', [KontestanController::class, 'getVotingData'])->name('admin.voting.data');
    Route::get('/admin/voting-chart', [KontestanController::class, 'votingChart'])->name('admin.voting.chart');
});

// Rute untuk pengguna biasa
Route::middleware('auth')->group(function () {
    Route::get('/kontestans', [KontestanController::class, 'userIndex'])->name('user.kontestans.index');
    Route::get('/kontestans/create', [KontestanController::class, 'create'])->name('user.kontestans.create');
    Route::post('/kontestans', [KontestanController::class, 'store'])->name('user.kontestans.store');
    Route::post('/kontestans/{kontestan}/vote', [KontestanController::class, 'vote'])->name('kontestans.vote');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::middleware(['auth'])->group(function () {
    Route::post('/kontestans/{kontestan}/vote', [KontestanController::class, 'vote'])->name('kontestans.vote');
});
});

// Route untuk halaman Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Include autentikasi
require __DIR__ . '/auth.php';
