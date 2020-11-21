@extends('layouts.main')
@section('title', 'Create Post')
@section('header')
    <header class="simple masthead">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>Добавить новый пост</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <div class="col-lg-8 col-md-10 mx-auto">
    @include('layouts.errors')
    <form method="post" action="{{route('posts.store')}}">
    @include('posts.single')
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
    </div>
@endsection