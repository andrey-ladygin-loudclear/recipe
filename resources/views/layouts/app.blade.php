<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" href="/assets/css/app.css">

    <title>Рецепты запределья</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
<div id="app" class="flex-center position-ref full-height main">
    <div class="header">
        @include('layouts.nav')
    </div>
    <div class="content">
        @yield('content')
    </div>
    @include('front.components.notify')
</div>
<script src="/assets/js/app.js"></script>
</body>
</html>
