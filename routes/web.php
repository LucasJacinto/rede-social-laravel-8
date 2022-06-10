<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::post('/', [PostController::class, 'store']);

Route::get('/profile', [PostController::class, 'profile']);

Route::get('/friends', [PostController::class, 'friends']);
