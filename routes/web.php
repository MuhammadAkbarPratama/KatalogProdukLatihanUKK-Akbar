<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KomentarController;
use App\Models\Produk;
use App\Models\Komentar;

Route::get('/', function () { return view('welcome'); })->name('landing');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/katalog', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');

    Route::middleware('can:admin-only')->group(function () {
        Route::get('/admin/dashboard', function () {
            $totalProduk = Produk::count();
            $totalKomentar = Komentar::count();
            return view('admin.dashboard', compact('totalProduk', 'totalKomentar'));
        })->name('admin.dashboard');

        Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    });

    Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
});