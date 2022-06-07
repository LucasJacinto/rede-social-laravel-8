<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::all();

        return view('welcome', ['posts' => $posts]);
    }

    public function profile()
    {
        return view('profile');
    }

    public function friends()
    {
        return view('friends');
    }
}
