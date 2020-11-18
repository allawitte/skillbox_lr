@if(session()->has('message'))
    <div class="alert alert-{{session('message_type')}} container text-center">
        {{session('message')}}
    </div>
@endif