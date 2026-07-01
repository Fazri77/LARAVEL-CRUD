<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ImportController;

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Home redirect
Route::get('/', function () {
    if (session('user_type')) {
        if (session('user_type') === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('barang.index');
    }
    return redirect()->route('login');
})->name('home');

Route::get('/admin/reports/export', [LaporanController::class, 'export'])
    ->name('admin.reports.export');

Route::post('/admin/import/barang', [ImportController::class, 'barang'])
    ->name('admin.import.barang');

Route::get('/admin/import/template', [ImportController::class, 'template'])
    ->name('admin.import.template');

Route::get('/admin/reports/import', function () {
    return view('admin.reports.import');
})->name('admin.reports.import');

// Admin Routes
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/barang', [AdminController::class, 'barangList'])->name('admin.barang');
    
    // Admin product management
    Route::get('/admin/products', [BarangController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [BarangController::class, 'create'])->name('admin.barang.create');
    Route::post('/admin/products/store', [BarangController::class, 'store'])->name('admin.barang.store');
    Route::get('/admin/products/{id}', [BarangController::class, 'show'])->name('admin.barang.show');
    Route::get('/admin/products/{id}/edit', [BarangController::class, 'edit'])->name('admin.barang.edit');
    Route::put('/admin/products/{id}', [BarangController::class, 'update'])->name('admin.barang.update');
    Route::delete('/admin/products/{id}', [BarangController::class, 'destroy'])->name('admin.barang.destroy');
    
    // Admin tools, reports, profile
    Route::get('/admin/tools', function () {
        return view('admin.tools.index');
    })->name('admin.tools');
    
    Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
    Route::post('/admin/transactions/{id}/confirm', [AdminController::class, 'confirmTransaction'])->name('admin.transactions.confirm');
    
    Route::get('/admin/profile', function () {
        return view('admin.profile.index');
    })->name('admin.profile');
});

// User Barang Routes
Route::middleware(['user'])->group(function () {
    Route::get('/collection', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/store', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/{id}', [BarangController::class, 'show'])->name('barang.show');
    Route::get('/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

    // User transaction routes
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions/store', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/transactions/history', [TransactionController::class, 'history'])->name('transactions.history');
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
    
    // User profile
    Route::get('/profile', function () {
        return view('user.profile.index');
    })->name('user.profile');
});



