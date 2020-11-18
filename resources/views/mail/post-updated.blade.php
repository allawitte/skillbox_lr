@component('mail::message')
    # Изменена статья {{$post->title}}

    The body of your message.
    @component('mail::button', ['url' => '/posts/'.$post->slug])
        Читать статью
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
