@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts in Category: {{ $keyword }}</h1>
        
        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->headline }}</h5>
                    <p class="card-text">{{ $post->text }}</p>
                    <a href="{{ route('blog.show', $post->id) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
