@extends('app')

@section('title', 'Words and things...')

@section('content')
    @forelse($articles as $article)
        @include('partials/article', ['article' => $article])
    @empty
        <p>Will be appearing here shortly. Stay tuned...</p>
    @endforelse

    <script type="text/javascript">
        $(function() {
            $('.background-overlay').hide().fadeIn(2000);
        });
    </script>
@endsection