<?php

use Illuminate\Support\Facades\Route;

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

    $nome = 'Lucas';
    $idade = 23;
    $arr = [1, 2, 3, 4, 5];
    $nomes = ['Lucas', 'Fran', 'Lívia', 'Laura'];

    return view('welcome', [
        'nome' => $nome,
        'idade' => $idade,
        'arr' => $arr,
        'nomes' => $nomes,
    ]);
});

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