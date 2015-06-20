@extends('app')

@section('title', 'Admin')

@section('content')
    <a class="btn btn-primary" href="/admin/articles/new">Add New</a>
    <table class="table table-responsive table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Published?</th>
                <th>Published At</th>
                <th>Created</th>
                <th colspan="3">Updated</th>
            </tr>
        </thead>
        <tbody>
            @forelse($articles as $article)
                <tr>
                    <td>{{$article->getKey()}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->slug}}</td>
                    <td>{{$article->is_published ? 'Yes' : 'No'}}</td>
                    <td>{{$article->published_at}}</td>
                    <td>{{$article->created_at}}</td>
                    <td>{{$article->updated_at}}</td>
                    <td><a href="{{ $article->url }}" class="btn btn-success">View</a></td>
                    <td><a href="/admin/articles/{{ $article->getKey() }}" class="btn btn-primary">Edit</a></td>
                    <td><a href="/admin/articles/{{ $article->getKey() }}/delete" class="btn btn-danger delete">Delete</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Nothing to see here.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection