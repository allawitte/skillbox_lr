<?php

namespace App\Http\Controllers;

use App\Mail\PostCreated;
use App\Models\Post;
use App\Models\Tag;
use App\Notifications\PostChanged;
use App\Notifications\PostDeleted;
use App\PriceFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPUnit\Util\Filesystem;

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

    public function show(Post $post, PriceFormatter $priceFormatter)
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
            'title' => 'required|min:2|max:50|unique:posts',
            'content' => 'required'
        ]);
        $fields['slug'] = Str::slug($request->get('title'));
        $fields['user_id'] = auth()->id();
        $post = Post::create(
            $fields
        );
       // event(new \App\Events\PostCreated($post));

        flash('Статья успешно добавлена');

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $fields = $request->validate([
            'title' => 'required|min:2|max:50|unique:posts'. ',id,' . $post->id,
            'content' => 'required'
        ]);
        if($post->title == $request->get('title')){
            $fields['slug'] = Str::slug($request->get('title'));
        }

        $post->update(
            $fields
        );
        $post->user->notify(new PostChanged());

        $postTags = $post->tags->keyBy('name');
        $tags = collect(explode(',', $request->get('tags')))->keyBy(function($item){
            return $item;
        });
        $syncIds = $postTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($postTags);
//        $tagsToDetach = $postTags->diffKeys($tags);
//        foreach ($tagsToAttach as $tag){
//            $tag = Tag::firstOrCreate(['name' => $tag]);
//            $post->tags()->attach($tag);
//        }
//        foreach ($tagsToDetach as $tag){
//            $post->tags()->detach($tag);
//        }
        foreach ($tagsToAttach as $tag){
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }

        $post->tags()->sync($syncIds);
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
