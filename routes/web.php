<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);

Route::get('/profile', [PostController::class, 'profile']);

Route::get('/friends', [PostController::class, 'friends']);
