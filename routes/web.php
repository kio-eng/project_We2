<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController; 

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('produk.index');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('produk', ProdukController::class)->except(['destroy']);
    
    // Only Admin can delete
    Route::delete('produk/{produk}', [ProdukController::class, 'destroy'])
        ->name('produk.destroy')
        ->middleware('role.admin');
});