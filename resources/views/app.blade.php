<!DOCTYPE html>
<html>
<head>
    <title>Three Oh - Web Development - @yield('title')</title>

    @yield('meta')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <style>
        .fa {
            font-size: 20px !important;
        }

        .fa > a:hover {
            text-decoration: none;
        }
    </style>

    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId={{ env('FACEBOOK_APP_ID') }}";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fixed">
            <ul class="nav navbar-nav">
                <li class=""><a href="{{ route('blog') }}">Three Oh</a></li>
                <li class="{{ str_contains(Route::current()->getName(), 'blog')  ? 'active' : '' }}"><a
                            href="{{ route('blog') }}">Blog</a></li>
                <li class="{{ Route::current()->getName() === 'contact' ? 'active' : '' }}"><a
                            href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="container-fixed content">
        <h1>@yield('title')</h1>
        @yield('content')
    </div>

    <footer class="text-center text-muted">
        &copy {{ \Carbon\Carbon::create()->format('Y') }} Three Oh Limited
    </footer>
</div>
</body>
</html>
