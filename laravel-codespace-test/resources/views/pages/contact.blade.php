@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="container">
    <h1>Contact Us</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('pages.contact.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label">Vorname <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Nachname <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-Mail-Adresse <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Betreff <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Text <span class="text-danger">*</span></label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" id="privacy_policy" name="privacy_policy" required>
            <label class="form-check-label" for="privacy_policy">Datenschutz Zustimmen <span class="text-danger">*</span></label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
