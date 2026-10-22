<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\CartController;

// Halaman utama dan produk
Route::get('/', [InstrumentController::class, 'index'])
    ->name('instruments.index');

Route::get('/alat-musik/tambah', [InstrumentController::class, 'create'])
    ->name('instruments.create');

Route::post('/alat-musik', [InstrumentController::class, 'store'])
    ->name('instruments.store');

Route::get('/alat-musik/{instrument}', [InstrumentController::class, 'show'])
    ->name('instruments.show');

Route::get('/alat-musik/{instrument}/edit', [InstrumentController::class, 'edit'])
    ->name('instruments.edit');

Route::put('/alat-musik/{instrument}', [InstrumentController::class, 'update'])
    ->name('instruments.update');

Route::delete('/alat-musik/{instrument}', [InstrumentController::class, 'destroy'])
    ->name('instruments.destroy');

// Keranjang belanja
Route::get('/keranjang', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/keranjang/tambah/{instrument}', [CartController::class, 'add'])
    ->name('cart.add');

Route::patch('/keranjang/update/{instrument}', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/keranjang/hapus/{instrument}', [CartController::class, 'remove'])
    ->name('cart.remove');