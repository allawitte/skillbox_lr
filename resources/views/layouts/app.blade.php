<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Quickstart - Intermediate</title>

    <!-- Fonts -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/css/all.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="/css/blog.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato';
            background: url("/img/home.jpg") center space no-repeat;
        }

        .fa-btn {
            margin-right: 6px;
        }
        .auth-container {
            margin-top: 100px;
        }
        .auth-container .card {
            background: rgba(255, 255, 255, 0.35);
        }
    </style>
</head>
<body id="app-layout">
@include('layouts.nav')

@yield('header')
<div class="container auth-container">
    <div class="row">
        @yield('content')
    </div>
</div>
<hr>

@include('layouts.footer')
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>