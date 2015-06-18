<!DOCTYPE html>
<html>
<head>
    <title>Three Oh - All things Web Development - @yield('title')</title>

    <meta charset="UTF-8">
    <meta name="description" content="Three Oh - All things Web Development">
    <meta name="keywords" content="three, oh, web, dev, development, php, laravel, laravel 5, coding, code, @yield('meta_keywords')">
    <meta name="author" content="Three Oh Limited">

    @yield('meta')

    <link href="{{ elixir('css/all.css') }}" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        .fa {
            font-size: 20px !important;
        }

        .fa > a:hover {
            text-decoration: none;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/prism.css') }}" type="text/css">

    <script src="https://www.google.com/recaptcha/api.js"></script>

    @if(app()->environment() === 'production')
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', '{{ env('GA_ID') }}', 'auto');
            ga('send', 'pageview');
        </script>

        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', {{ env('GA_ID') }}]);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
    @endif
</head>
<body>
<div class="background-overlay"></div>

<div class="container">
    <div class="container-fixed container-fixed-main">
        <nav class="navbar navbar-default">
            <div class="container-fixed">
                <ul class="nav navbar-nav">
                    <li class=""><a href="{{ route('blog') }}">Three Oh</a></li>
                    <li class="{{ Route::current() && str_contains(Route::current()->getName(), 'blog')  ? 'active' : '' }}">
                        <a href="{{ route('blog') }}">Blog</a></li>
                    <li class="{{ Route::current() && Route::current()->getName() === 'contact' ? 'active' : '' }}"><a
                                href="{{ route('contact') }}">Contact</a></li>
                    @if(auth()->check())
                        <li class="{{ Route::current() && str_contains(Route::current()->getName(), 'admin') ? 'active' : '' }}">
                            <a href="{{ route('admin') }}">Admin</a></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    @endif
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
</div>

<script src="{{ elixir('js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/prism.js') }}"></script>

@yield('scripts')

</body>
</html>
