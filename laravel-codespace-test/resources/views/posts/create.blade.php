@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Article</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" name="author" id="author" class="form-control" value="Bastian Kopf">
            </div>

            <div class="form-group">
                <label for="headline">Headline:</label>
                <input type="text" name="headline" id="headline" class="form-control" value="Test Headline">
            </div>

            <div class="form-group">
                <label for="publish_date">Publish Date:</label>
                <input type="date" name="publish_date" id="publish_date" class="form-control" value="2018-07-22">
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category" class="form-control">
                    <option value="Tech">Tech</option>
                    <option value="Dev">Dev</option>
                    <option value="Funny">Funny</option>
                    <option value="Frameworks">Frameworks</option>
                    <option value="Gaming">Gaming</option>
                </select>
            </div>

            <div class="form-group">
                <label for="keywords">Keywords (comma-separated):</label>
                <input type="text" name="keywords" id="keywords" class="form-control" value="test1, test2">
            </div>

            <div class="form-group">
                <label for="text">Text:</label>
                <textarea name="text" id="text" class="form-control" rows="5">asdasdasdasdasd</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>


            <button type="submit" class="btn btn-primary">Create Article</button>
        </form>
    </div>
@endsection
