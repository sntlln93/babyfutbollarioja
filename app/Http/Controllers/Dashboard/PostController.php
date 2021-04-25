<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\CreateImageService;
use App\Services\UpdateImageService;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('dashboard.posts.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('dashboard.posts.create')->with('post', new Post);;
    }

    public function store(Request $request)
    {
        $validatedPost = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'photo' => 'sometimes|mimes:jpeg,jpg'
        ]);

        DB::transaction(function () use ($validatedPost) {
            $post = Post::create([
                'title' => $validatedPost['title'],
                'body' => $validatedPost['body'],
                'created_by' => auth()->user()->id
            ]);

            (new CreateImageService)->create($post, $validatedPost['photo']);
        });

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('dashboard.posts.edit')->with('post', $post);
    }

    public function update(Request $request, Post $post)
    {
        $validatedPost = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'photo' => 'sometimes|mimes:jpeg,jpg'
        ]);

        DB::transaction(function () use ($post, $validatedPost) {
            $post->update([
                'title' => $validatedPost['title'],
                'body' => $validatedPost['body'],
                'created_by' => auth()->user()->id
            ]);

            (new UpdateImageService)->update($post, $validatedPost['photo']);
        });
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        DB::transaction(function () use ($post) {
            $post->image()->delete();
            $post->delete();
        });
        return redirect()->route('posts.index');
    }
}
