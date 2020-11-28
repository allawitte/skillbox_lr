<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="/css/app.css">
    <title>@yield('title')</title>

</head>

<body>
@include('layouts.nav')
@yield('header')
@include('layouts.flash-message')
<div class="container-fluid">
    <div class="row">
        @yield('content')
        @yield('sidebar')
    </div>
</div>
<hr>

@include('layouts.footer')
<script src="/js/app.js"></script>

</body>

</html>