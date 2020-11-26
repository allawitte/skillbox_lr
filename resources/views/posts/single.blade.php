{{csrf_field()}}
<div class="form-group">
    <label>Название</label>
    @php
        $title = isset($post) ? $post->title : ''
    @endphp
    <input type="text" class="form-control" name="title" value="{{ old('title', $title) }}">
</div>
<div class="form-group">
    <input type="hidden" name="slug" value="{{ $post->slug }}">
    <input type="hidden" name="id" value="{{ $post->id }}">
    <label>Краткое описание</label>
    <input type="text" class="form-control" name="description"
           value="{!!   old('description',  $post->description) !!}">
</div>
<div class="form-group">
    <label>Теги поста</label>
    @php
        $tags = isset($post->tags) ? $post->tags->pluck('name')->implode(',') : ''
    @endphp
    <input type="text"
           class="form-control"
           name="tags"
           value="{{old('tags', $tags)}}"
    >
</div>
<div class="form-group">
    <label>Содержание поста</label>
    <textarea class="form-control" name="content">{!!  old('content', $post->content) !!}</textarea>
</div>
