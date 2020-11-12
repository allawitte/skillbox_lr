<div class="post-preview">
    <a href="{{route('posts.show',['post' => $post->slug])}}">
        <h2 class="post-title">
            {{$post->title}}
        </h2>
        <h3 class="post-subtitle">
            {!! $post->description !!}
        </h3>
    </a>
    <p class="post-meta">Posted by
        <a href="#">{{$post->user->name}}</a>
        {{$post->created_at->toFormattedDateString()}}
    </p>
    @include('posts.tags', ['tags' => $post->tags])
</div>
<hr>