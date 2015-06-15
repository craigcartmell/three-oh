@extends('app')

@section('title', 'Words and things...')

@section('content')
    @forelse($articles as $article)
        @include('partials/article', ['article' => $article, 'str_limit' => 200])
    @empty
        <div class="alert alert-info">Nothing to see here :(<div>
    @endforelse
@endsection