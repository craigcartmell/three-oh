@extends('app')

@section('title', 'Home')

@section('content')
    @forelse($articles as $article)
        @include('partials/article', ['article' => $article, 'str_limit' => 200])
    @empty
        <div class="alert alert-info">Nothing to see here :(<div>
    @endforelse
@endsection