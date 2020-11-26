@extends('layouts.main')
@section('title', 'Contacts')
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Свяжитесь с нами</h1>
                        <span class="subheading">У вас есть вопрос? У нас есть ответ.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Хотите связаться с нами? Заполните форму, отправьте сообщение и свяжусь с вами при первой же возможности!</p>
                @include('layouts.errors')
                <form method="post" action="{{route('feedbacks.store')}}">
                    {{csrf_field()}}
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Имя</label>
                            <input type="text" class="form-control" placeholder="Имя" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Сообщение</label>
                            <textarea rows="5" class="form-control" placeholder="Сообщение" name="message">{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>

    <hr>
@endsection