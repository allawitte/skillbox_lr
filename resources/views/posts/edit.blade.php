@extends('layouts.main')
@section('title', 'Create Post')
@section('header')
    <header class="simple masthead">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>Изменить пост</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <div class="col-lg-8 col-md-10 mx-auto">
        @include('layouts.errors')
        <form method="post" action="{{route('posts.update', ['post' => $post->slug])}}">
            @method('PATCH')
            @include('posts.single', ['post' =>$post])
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <p>
            <form method="POST" action="{{route('posts.destroy',['post' => $post->slug])}}">
                {{csrf_field()}}
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Удалить">
            </form>
            </p>
        </div>
    </div>
@endsection