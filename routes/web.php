<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Editor;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Homepage after authentication and verification
Route::get('/home', function () {
    return view('pages.home');
})->middleware(['auth', 'verified'])->name('dashboard');

// Items page if user is authenticated and verified
Route::get('/items', [ItemsController::class, 'index'])->middleware(['auth', 'verified']);

//Admin Dashboard 
Route::get('/admin/dashboard', [AdminController::class, 'admindashboard'])->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');
// Admin CRUD
Route::middleware(['auth','verified','admin'])->group(function () {
    Route::get('/admin/items/create', [ItemsController::class, 'create'])->name('items.create');
    Route::post('/admin/items', [ItemsController::class, 'store'])->name('items.store');
    Route::get('/admin/items/{item}/edit', [ItemsController::class, 'edit'])->name('items.edit');
    Route::put('/admin/items/{item}', [ItemsController::class, 'update'])->name('items.update');
    Route::delete('/admin/items/{item}', [ItemsController::class, 'destroy'])->name('items.destroy');
    
});

// // Editor Dashboard
Route::get('/editor/dashboard', [EditorController::class, 'editordashboard'])->middleware(['auth', 'verified', 'editor']);
// // Editor Edit
Route::middleware(['auth','verified', 'editor'])->group(function () {
    Route::get('/editor/items/{item}/edit', [ItemsController::class, 'edit'])->name('items.editor.edit');
    Route::put('/editor/items/{item}', [ItemsController::class, 'update'])->name('items.editor.update');
});

// Profile Update without verification
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Profile Update with verification
Route::patch('/profile', [ProfileController::class, 'update'])->middleware(['auth', 'verified'])->name('profile.update');

require __DIR__.'/auth.php';
