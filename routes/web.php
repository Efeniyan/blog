<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Admin;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;

// Route::get('/', [PagesController::class, 'index']);
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

Route::get('/profile', [UserController::class, 'index'])->name('profile')->middleware('auth');



Route::get('/', function () {
    return Inertia::render('Master', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
