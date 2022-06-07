<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/friends', function () {
    
    $busca = request('search');

    return view('friends', ['busca' => $busca]);
});

Route::get('/friends_teste/{id?}', function ($id = null) {
return view('friend', ['id' => $id]);
});