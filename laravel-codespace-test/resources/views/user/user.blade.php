@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        <p class="lead">Welcome, {{ Auth::user()->name }}!</p>
                        <p>Email: {{ Auth::user()->email }}</p>

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('profile.change-password') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="current_password">{{ __('Current Password') }}</label>
                                <input type="password" name="current_password" id="current_password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="new_password">{{ __('New Password') }}</label>
                                <input type="password" name="new_password" id="new_password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="new_password_confirmation">{{ __('Confirm New Password') }}</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Change Password') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
