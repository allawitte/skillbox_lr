@extends('layouts.main')
@section('title', 'Post')
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{$post->title}}</h1>
                        <h2 class="subheading">{!! $post->description !!}</h2>
                        <span class="meta">Posted by
              <a href="#">{{$post->user->name}}</a>
                            {{$post->created_at}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">{!! $post->content !!}
                </div>
                @include('layouts.sidebar')
            </div>
        </div>
    </article>
    <p><a class="btn btn-link" href="{{route('posts.edit', ['post' => $post->slug])}}">Изменить</a></p>
    @include('posts.tags')
    <hr>
@endsection