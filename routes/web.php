<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->middleware('auth');
Route::get('/profile', [PostController::class, 'profile'])->middleware('auth');

Route::post('/', [PostController::class, 'store']);
Route::delete('/profile/{id}', [PostController::class, 'destroy'])->middleware('auth');
Route::put('/profile/{id}', [PostController::class, 'update'])->middleware('auth');

Route::get('/friends', [PostController::class, 'friends'])->middleware('auth');


