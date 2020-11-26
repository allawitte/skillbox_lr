@component('mail::message')
    # Изменена статья {{$post->title}}

    The body of your message.
    @component('mail::button', ['url' => route('posts.show',$post->slug)])
        Читать статью
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
