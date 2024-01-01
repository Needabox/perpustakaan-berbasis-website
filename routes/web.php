<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

// Management User
use App\Http\Controllers\Backsite\Operational\BookController;

// Operational
use App\Http\Controllers\backsite\ManagementUser\UserController;
use App\Http\Controllers\backsite\Operational\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
    Route::resource('category', CategoryController::class);
    
    Route::resource('user', UserController::class);
    
    Route::resource('category', CategoryController::class);
    
    Route::get('book/export', [BookController::class, 'export'])->name('book.export');
    Route::resource('book', BookController::class);
});


require __DIR__.'/auth.php';
