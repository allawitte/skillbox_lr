<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\PriceFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPUnit\Util\Filesystem;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('tags')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post, PriceFormatter $priceFormatter)
    {
        dd($priceFormatter->format(200));
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
        Post::create(
            $fields
        );
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
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
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
