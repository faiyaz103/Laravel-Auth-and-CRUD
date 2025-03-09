<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/items', function () {
    return view('pages.items');
});

Route::get('/home', function () {
    return view('pages.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('admin/dashboard', [AdminController::class, 'admindashboard'])->middleware(['auth', 'verified', 'admin']);

Route::get('editor/dashboard', [EditorController::class, 'editordashboard'])->middleware(['auth', 'verified', 'editor']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::patch('/profile', [ProfileController::class, 'update'])->middleware(['auth', 'verified'])->name('profile.update');

require __DIR__.'/auth.php';
