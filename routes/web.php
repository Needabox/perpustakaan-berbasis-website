<?php

use Illuminate\Support\Facades\Route;

// Management User
use App\Http\Controllers\backsite\ManagementUser\UserController;

// Operational
use App\Http\Controllers\Backsite\Operational\BookController;
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
    return view('layouts.default');
});

Route::resource('user', UserController::class);
Route::resource('category', CategoryController::class);
Route::resource('book', BookController::class);