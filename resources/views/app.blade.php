<!DOCTYPE html>
<html>
<head>
    <title>Three Oh - @yield('title')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</head>
<body>
<div class="container">
    <div class="container-fixed pull-left"><a href="/"><h1>Three Ohhhhhhhhhhhhhh</h1></a></div>

    <nav class="container-fixed pull-right">
        <ul class="nav nav-pills navbar-default">
            <li class="{{ Route::current()->getName() === 'home' ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
            <li class="{{ str_contains(Route::current()->getName(), 'blog')  ? 'active' : '' }}"><a href="{{ route('blog') }}">Blog</a></li>
            <li class="{{ Route::current()->getName() === 'about' ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>
            <li class="{{ Route::current()->getName() === 'contact' ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </nav>

    <br><br><br>

    <div class="container-fixed content">
        @yield('content')
    </div>

    <footer class="text-center text-muted">
        &copy {{ \Carbon\Carbon::create()->format('Y') }} Three Oh
    </footer>
</div>
</body>
</html>
