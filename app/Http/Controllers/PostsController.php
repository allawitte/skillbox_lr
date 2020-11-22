<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Notifications\PostUpdated;
use App\Notifications\PostDeleted;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Post as PostValidate;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
        $this->middleware('can:update, post')->except(['index', 'store', 'create']);
    }

    public function index()
    {
        $posts = Post::with('tags')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostValidate $request)
    {
        $fields = $request->validate($request->rules());
        $fields['slug'] = Str::slug($request->get('title'));
        $fields['user_id'] = auth()->id();
        $post = Post::create(
            $fields
        );
        $post->setTags($request, false);
        flash('Статья успешно добавлена');
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(PostValidate $request, Post $post)
    {
        $fields = $request->validate($request->rules($post->id));
        if ($post->title != $request->get('title')) {
            $fields['slug'] = Str::slug($request->get('title'));
        }

        $post->update(
            $fields
        );
        $post->user->notify(new PostUpdated($post));
        $post->setTags($request, true);

        flash('Статья успешно отредактирована');
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $article = $post;
        $post->delete();
        $post->user->notify(new PostDeleted($article));
        flash('Статья успешно удалена', 'warning');
        return redirect()->route('posts.index');
    }
}
