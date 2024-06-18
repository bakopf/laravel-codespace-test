@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Blog Articles</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($posts->isEmpty())
            <p>No articles yet.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Author</th>
                        <th>Headline</th>
                        <th>Publish Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->author }}</td>
                            <td>{!! Str::limit($post->text, 100) !!}</td>
                            <td>{{ $post->publish_date }}</td>
                            <td>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @auth
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Article</a>
        @endauth

        @guest
            <p>You need to <a href="{{ route('login') }}">login</a> to create new articles.</p>
        @endguest
    </div>
@endsection
