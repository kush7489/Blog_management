<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('post/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('post/store', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('post/edit/{id}', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('post/update/{id}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('post/delete/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');