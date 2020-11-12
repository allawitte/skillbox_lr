@php
$tags = $tags ?? collect();
@endphp
<div class="tagscloud">
@if($tags->isNotEmpty())
    <div>
        @foreach($tags as $tag)
            <a href="{{route('posts_for_tag', $tag->name)}}" class="badge badge-secondary">{{$tag->name}}</a>
        @endforeach
    </div>
@endif
</div>