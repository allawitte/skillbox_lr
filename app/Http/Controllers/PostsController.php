<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $fields = request()->validate([
            'title' => 'required|min:2|max:50|unique',
            'content' => 'required'
        ]);
        $fields['slug'] = Str::slug($request->get('title'));
        Post::create(
            $fields
        );
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request)
    {
        $fields = request()->validate([
            'title' => 'required|min:2|max:50|unique',
            'content' => 'required'
        ]);
        $fields['slug'] = Str::slug($request->get('title'));
        Post::update(
            $fields
        );
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
