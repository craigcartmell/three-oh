<!DOCTYPE html>
<html>
<head>
    <title>Three Oh - @yield('title')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</head>
<body>
<div class="container">
    <ul class="nav nav-pills">
        <li role="presentation" class="active"><a href="/">Home</a></li>
        <li role="presentation"><a href="#">About</a></li>
        <li role="presentation"><a href="#">Contact</a></li>
    </ul>
    <div class="content">
        @yield('content')
    </div>
</div>
</body>
</html>
