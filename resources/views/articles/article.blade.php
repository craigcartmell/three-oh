@extends('app')

@section('title', $article->title)

@section('meta')
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">
    <meta property="og:url" content="{{ $article->url }}">
    <meta property="og:description" content="{{ substr(strip_tags($article->body_parsed), 0, 200) }}">
    <meta property="fb:app_id" content="{{ env('FACEBOOK_APP_ID') }}">
    <meta property="og:type" content="article">
    <meta property="article:author" content="">
    <meta property="article:publisher" content="{{ url() }}">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@craigcartmell1">
    <meta name="twitter:title" content="{{ $article->title }}">
    <meta name="twitter:description" content="{{ substr(strip_tags($article->body_parsed), 0, 200) }}">
    <meta name="twitter:creator" content="@craigcartmell1">
@endsection

@section('content')
    @include('partials/article', ['article' => $article, 'share' => true])

    <br><br><br>

    <a id="comments"></a>
    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES * * */
        var disqus_shortname = 'three-oh';

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
@endsection