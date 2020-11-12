@extends('layouts.main')
@section('title', 'Create Post')
@section('content')
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @include('layouts.errors')
                <form method="post" action="{{route('posts.store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label>Краткое описание</label>
                        <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                    </div>
                    <div class="form-group">
                        <label>Содержание поста</label>
                        <textarea class="form-control" name="content">{{ old('content') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection