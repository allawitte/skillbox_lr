@component('mail::message')
    # Удалена статья {{$post->title}}

    The body of your message.
    @component('mail::button', ['url' => '/posts'])
        Смотреть блог
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
