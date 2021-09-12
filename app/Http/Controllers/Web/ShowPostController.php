<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use App\Http\Controllers\Controller;

class ShowPostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        
        return view('web.posts.index')->with('posts', $posts);
    }

    public function show(Post $post)
    {
        return view('web.posts.show')->with('post', $post);
    }
}
