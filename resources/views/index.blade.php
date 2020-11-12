@extends('layouts.main')
@section('title', 'Blog')
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home.jpg'); height: 100vh">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-8 col-md-10 mx-auto">--}}
                {{--@foreach($posts as $post)--}}
                {{--@include('posts.item')--}}
                {{--@endforeach--}}
                {{--<!-- Pager -->--}}
                {{--<div class="clearfix">--}}
                    {{--<a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<hr>--}}
@endsection