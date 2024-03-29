<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\manageProdukController;
use App\Http\Controllers\orderProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/akun', [AkunController::class, 'index'])->name('akun.index');
    Route::post('/akun/store', [AkunController::class, 'store'])->name('akun.store');
    Route::patch('/akun/edit/{id}', [AkunController::class, 'update'])->name('akun.update');
    Route::delete('/akun/destroy/{id}', [AkunController::class, 'destroy'])->name('akun.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/manageProduk', [manageProdukController::class, 'index'])->name('manageProduk.index');
});
Route::middleware('auth')->group(function () {
    Route::get('/orderProduk', [orderProdukController::class, 'index'])->name('orderProduk.index');
});

require __DIR__.'/auth.php';
