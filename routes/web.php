<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;

Route::get('/', [PagesController::class, 'index']);
Route::get('/contact-us', [PagesController::class, 'contact'])->middleware(Admin::class);
Route::get('/about', [PagesController::class, 'about'])->middleware(Admin::class);
Route::get('/articles', [ArticlesController::class, 'index']);
// Route::get('/article/{id}', [ArticlesController::class,'show']);
// Route::get('article/{article}', [ArticlesController::class, 'show']);
Route::get('/article/{id}', [ArticlesController::class, 'show'])->middleware('auth');
Route::get('/form', [ArticlesController::class, 'create'])->middleware('auth');
Route::post('/articles/create', [ArticlesController::class, 'store'])->middleware('auth');
Route::get('article/{article}/edit', [ArticlesController::class, 'edit'])->middleware('auth');
Route::patch('article/{article}/edit', [ArticlesController::class, 'update'])->middleware('auth');
Route::delete('article/{article}/delete', [ArticlesController::class, 'delete'])->middleware('auth');
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::get('/login', [SessionController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'authenticate'])->name('login')->middleware('guest');
Route::get('/profile', [UserController::class, 'index'])->name('profile')->middleware('auth');
Route::post('/logout', [sessionController::class, 'logout'])->name('logout')->middleware('auth');
