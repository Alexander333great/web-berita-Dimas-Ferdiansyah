<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route Group Middleware Auth untuk bagian backend Admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/berita', [AdminController::class, 'berita'])->name('admin.berita');
    Route::get('/admin/kategori', [AdminController::class, 'kategori'])->name('admin.kategori');
});
