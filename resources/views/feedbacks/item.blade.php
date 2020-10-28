<div class="post-preview">
    <h2 class="feedback-title">
        {{$feedback->name}}
    </h2>
    <p class="feedback-subtitle">
        {!! $feedback->message !!}
    </p>
    <p class="post-meta">Posted by
        <span>{{$feedback->email}}</span>
        {{$feedback->created_at->toFormattedDateString()}}</p>
</div>
<hr>