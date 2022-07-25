<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index() 
    {
        $search = request('search');

        if($search) {
            $posts = Post::where([
                ['content', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $posts = Post::latest()->get();
            $postCreators = User::all();
        }

        return view('welcome', [
            'posts' => $posts,
            'search' => $search,
            'postCreators' => $postCreators,
        ]);
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

        $user = auth()->user();
        $post->user_id = $user->id;
        
        if ($post->content === null && !$request->hasFile('image')) {
            return redirect('/')->with('msg', 'Nada para postar!');
        } else {
            $post->save();
            return redirect('/');
        } 
        
    }

    public function profile()
    {
        $user = auth()->user();
        $posts = Post::orderBy('updated_at', 'desc')->get();
        //$posts = $user->posts;

        return view('profile', ['posts' => $posts, 'user' => $user]);
    }
    
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return redirect('/profile');
    }

    public function update(Request $request)
    {
        $data = $request->all();

        //Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/posts'), $imageName);

            $data['image'] = $imageName;
        }

        Post::findOrFail($request->id)->update($data);

        return redirect('/profile');
    }

    public function likePost($id)
    {
        $user = auth()->user();

        $user->postsLikes()->attach($id);

        return redirect('/');
    }

    public function friends()
    {
        return view('friends');
    }
}
