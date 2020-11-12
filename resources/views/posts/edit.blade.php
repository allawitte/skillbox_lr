@extends('layouts.main')
@section('title', 'Create Post')
@section('content')
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @include('layouts.errors')
                <form method="post" action="{{route('posts.update', ['post' => $post->slug])}}">
                    @method('PATCH')
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
                    </div>
                    <div class="form-group">
                        <label>Краткое описание</label>
                        <input type="text" class="form-control" name="description"
                               value="{!!   old('description', $post->description) !!}">
                    </div>
                    <div class="form-group">
                        <label>Теги поста</label>
                        @php //dd($post->tags->pluck('name')->implode(',')) @endphp
                        <input type="text"
                               class="form-control"
                               name="tags"
                               value="{{old('tags', $post->tags->pluck('name')->implode(','))}}"
                        >
                    </div>
                    <div class="form-group">
                        <label>Содержание поста</label>
                        <textarea class="form-control" name="content">{!!  old('content', $post->content) !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <p>
                <form method="POST" action="{{route('posts.destroy',['post' => $post->slug])}}">
                    {{csrf_field()}}
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Удалить">
                </form>
                </p>
            </div>
        </div>
    </div>
@endsection