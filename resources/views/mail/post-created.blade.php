@component('mail::message')
# Создана новая статья {{$post->title}}

{{$post->description}}

@component('mail::button', ['url' => route('posts.show',$post->slug)])
Читать статью
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
