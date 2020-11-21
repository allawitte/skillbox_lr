

        {{csrf_field()}}
        <div class="form-group">
            <label>Название</label>
            @php
            $title = isset($post) ? $post->title : ''
            @endphp
            <input type="text" class="form-control" name="title" value="{{ old('title', $title) }}">
        </div>
        <div class="form-group">
            <label>Краткое описание</label>
            @php
            $description = isset($post) ? $post->description : ''
            @endphp
            <input type="text" class="form-control" name="description"
                   value="{!!   old('description',  $description) !!}">
        </div>
        <div class="form-group">
            <label>Теги поста</label>
            @php
            $tags = isset($post) ? $post->tags->pluck('name')->implode(',') : ''
            @endphp
            <input type="text"
                   class="form-control"
                   name="tags"
                   value="{{old('tags', $tags)}}"
            >
        </div>
        <div class="form-group">
            <label>Содержание поста</label>
            @php
            $content = isset($post) ? $post->content : ''
            @endphp
            <textarea class="form-control" name="content">{!!  old('content', $content) !!}</textarea>
        </div>
