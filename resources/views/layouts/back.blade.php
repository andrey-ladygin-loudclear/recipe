<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" href="/assets/css/back.css">

    <title>Рецепты запределья</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
<div class="header">
    @include('back.components.nav')
</div>
<div id="app" class="flex-center position-ref full-height main">
    <div class="container">
        @yield('content')
    </div>
</div>
<script src="/assets/js/back.js"></script>
</body>
</html>
