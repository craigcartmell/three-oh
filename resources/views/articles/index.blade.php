@extends('app')

@section('title', 'Words and things...')

@section('meta')
    <meta property="og:title" content="{{ env('APP_NAME') }} Blog">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">
    <meta property="og:url" content="{{ route('blog') }}">
    <meta property="og:description" content="A blog about all things Web Development.">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ asset('images/logo_short.png') }}">

    <meta property="fb:app_id" content="{{ env('FACEBOOK_APP_ID') }}">
    <meta property="article:author" content="">
    <meta property="article:publisher" content="{{ url() }}">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{ env('TWITTER_HANDLE') }}">
    <meta name="twitter:title" content="{{ env('APP_NAME') }} Blog">
    <meta name="twitter:description" content="A blog about all things Web Development.">
    <meta name="twitter:creator" content="{{ env('TWITTER_HANDLE') }}">
    <meta name="twitter:image" content="{{ asset('images/logo_short.png') }}">
@endsection

@section('content')
    @forelse($articles as $article)
        @include('partials/article', ['article' => $article])
    @empty
        <p>Will be appearing here shortly. Stay tuned...</p>
    @endforelse
@endsection