<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware('is_guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register-post');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/books', [BookController::class, 'index'])->name('dashboard.books.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('admin');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index')->middleware('admin');

    Route::get('/rentlog', [RentLogController::class, 'index'])->name('dashboard.rentlog.index')->middleware('admin');

    Route::get('/users', [UserController::class, 'users'])->name('dashboard.users.index')->middleware('admin');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile.index')->middleware('client');
});
