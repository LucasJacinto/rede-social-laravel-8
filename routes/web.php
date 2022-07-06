<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->middleware('auth');
Route::post('/', [PostController::class, 'store']);

Route::get('/profile', [PostController::class, 'profile'])->middleware('auth');

Route::get('/friends', [PostController::class, 'friends'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
