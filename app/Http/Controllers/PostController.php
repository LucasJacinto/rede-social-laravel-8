<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::latest()->get();

        return view('welcome', ['posts' => $posts]);
    }

    public function store(Request $request) 
    {
        $post = new Post;
        $post->content = $request->content;

        //Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/posts'), $imageName);

            $post->image = $imageName;
        }

        $post->save();

        return redirect('/');
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
