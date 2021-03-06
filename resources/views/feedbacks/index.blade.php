@extends('layouts.main')
@section('title', 'Feedbacks')
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/about-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>All feedbacks list</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach($feedbacks as $feedback)
                    @include('feedbacks.item')
            @endforeach
            <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Feedbacks &rarr;</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection