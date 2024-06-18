@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Front Page</h1>

        @if ($posts->isEmpty())
            <p>No articles yet.</p>
        @else
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">{{ $post->author }}</p>
                                @if ($post->filename)
                                    <img src="{{ asset('storage/' . $post->filepath) }}" alt="Post Image">
                                @endif
                                <h5 class="card-title mt-3">{!! $post->headline !!}</h5>
                                <p class="card-text">{!! Str::limit($post->text, 50) !!}</p>
                                <a href="{{ route('blog.show', $post->id) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
