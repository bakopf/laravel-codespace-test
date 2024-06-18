@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="text-muted mt-1">{{ $post->author }} | {{ $post->publish_date }}</p> <p>Last Change:{{ $post->updated_at}}</p>
        @if ($post->filename)
            <img src="{{ asset('storage/' . $post->filepath) }}" alt="Post Image" class="img-fluid mt-3">
        @endif
        <p>Category: @if ($post->category)<a href="{{ route('blog.category', $post->category) }}">{{ $post->category }}</a></p>@endif 
        <p>Keywords:
            @if ($post->keywords)
                @foreach (explode(',', $post->keywords) as $keyword)
                    <a href="{{ route('blog.keyword', $keyword) }}">{{ $keyword }}</a>@unless($loop->last),@endunless
                @endforeach
            @endif 
        </p>
        <div>{!! $post->headline !!}</div>
        <div>{!! $post->text !!}</div>
        <div><a href="{{ route('frontpage') }}" class="btn btn-primary mt-5">Back to Front Page</a></div>
    </div>
@endsection
