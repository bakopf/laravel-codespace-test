@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Article</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $post->author }}">
            </div>

            <div class="form-group">
                <label for="headline">Headline:</label>
                <input type="text" name="headline" id="headline" class="form-control" value="{{ $post->headline }}">
            </div>
            <div class="form-group">
                <label for="publish_date">Publish Date:</label>
                <input type="date" name="publish_date" id="publish_date" class="form-control" value="{{ $post->publish_date }}">
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category" class="form-control">
                    <option value="Tech" {{ $post->category === 'Tech' ? 'selected' : '' }}>Tech</option>
                    <option value="Dev" {{ $post->category === 'Dev' ? 'selected' : '' }}>Dev</option>
                    <option value="Funny" {{ $post->category === 'Funny' ? 'selected' : '' }}>Funny</option>
                    <option value="Frameworks" {{ $post->category === 'Frameworks' ? 'selected' : '' }}>Frameworks</option>
                    <option value="Gaming" {{ $post->category === 'Gaming' ? 'selected' : '' }}>Gaming</option>
                </select>
            </div>

            <div class="form-group">
                <label for="keywords">Keywords:</label>
                <input type="text" name="keywords" id="keywords" class="form-control" value="{{ $post->keywords }}">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control-file">
                @if ($post->filename)
                    <div>
                        <img src="{{ asset('/storage/' . $post->filepath) }}" alt="Current Image" style="max-width: 200px;">
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="text">Text:</label>
                <textarea name="text" id="text" class="form-control" rows="5">{{ $post->text }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Article</button>
        </form>
    </div>
@endsection
