@extends('app')

@section('title', 'Article')

@section('content')
    @include('partials/errors')
    <form method="post">
        {!! csrf_field() !!}

        <label for="title">Title:</label> <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}" placeholder="A new blog post...">
        <label for="body">Body:</label><textarea id="body" name="body" placeholder="Say something...">{{ old('body', $article->body) }}</textarea>
        <label for="tags">Tags:</label><textarea id="tags" name="tags" placeholder="PHP,Laravel">{{ old('tags', $article->tags_delimited) }}</textarea>

        <label for="is_published">Publish?</label> <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $article->is_published) ? 'checked' : '' }}>

        <input type="submit" id="submit" name="submit" value="Save">
    </form>
@endsection