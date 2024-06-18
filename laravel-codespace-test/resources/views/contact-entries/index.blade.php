<!-- resources/views/contact-entries/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Contact Form Entries</h1>

    <ul>
        @foreach ($entries as $entry)
            <li>{{ $entry->first_name }} {{ $entry->last_name }} - {{ $entry->email }}</li>
        @endforeach
    </ul>
@endsection
