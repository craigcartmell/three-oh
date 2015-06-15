@extends('app')

@section('title', $article->title ?: 'New Article')

@section('content')
    @include('partials/errors')
    <form method="post">
        {!! csrf_field() !!}

        <div>
            <label for="title" class="label label-primary">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}" placeholder="A new blog post..." class="form-control">
        </div>

        <br>

        <div>
            <label for="body" class="label label-primary">Body:</label>
            <textarea id="body" name="body" placeholder="Say something..." class="form-control">{{ old('body', $article->body) }}</textarea>
        </div>

        <br>
        <div>
            <label for="tags" class="label label-primary">Tags:</label>
            <input type="text" id="tags" name="tags"  value="{{ old('tags', $article->tags_delimited) }}" placeholder="PHP,Laravel" class="form-control">
        </div>

        <br>
        <div>
            <label for="is_published" class="label label-primary">Publish?</label>
            <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $article->is_published) ? 'checked' : '' }}>
        </div>

        <br>
        <div>
            <input type="submit" id="submit" name="submit" value="Save" class="btn btn-primary">
        </div>

    </form>
@endsection