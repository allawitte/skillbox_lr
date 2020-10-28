<div class="post-preview">
    <a href="{{url('/posts/show',['post' => $post->slug])}}">
        <h2 class="post-title">
            {{$post->title}}
        </h2>
        <h3 class="post-subtitle">
            {!! $post->description !!}
        </h3>
    </a>
    <p class="post-meta">Posted by
        <a href="#">Start Bootstrap</a>
        {{$post->created_at->toFormattedDateString()}}</p>
</div>
<hr>