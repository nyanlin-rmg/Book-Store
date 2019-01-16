<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')

    @include('layouts.css')

    @yield('css')
</head>
<body role="document">
@include('layouts.nav')
<div class="container">
    @yield('content')
    @include('layouts.bottom')
</div>
@include('layouts.scripts')
@include('sweetalert::alert')
@yield('scripts')
</body>
</html>