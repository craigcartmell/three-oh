@extends('app')

@section('title', 'Words and that...')

@section('content')
    <div class="alert alert-info">
        Seen anything interesting? Feel free to comment and share. Alternatively, you can drop me an email <a href="{{ route('contact') }}">here</a>.
    </div>

    @forelse($articles as $article)
        @include('partials/article', ['article' => $article, 'str_limit' => 200])
    @empty
        <div class="alert alert-info">Nothing to see here :(<div>
    @endforelse
@endsection