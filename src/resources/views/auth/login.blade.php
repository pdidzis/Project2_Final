@extends('layout')

@section('content')
    <h1>{{ $title }}</h1>
    <hr>

    <!-- Display error message if authentication fails -->
    @if ($errors->any())
        <div class="alert alert-danger">
            Failed to authenticate. Please try again!
        </div>
    @endif

    <!-- Login form -->
    <form method="post" action="/auth">
        @csrf
        <!-- Username input -->
        <div class="mb-3">
            <label for="login-name" class="form-label">User Name</label>
            <input
                type="text"
                id="login-name"
                name="name"
                class="form-control"
                autocomplete="off"
                autofocus
            >
        </div>

        <!-- Password input -->
        <div class="mb-3">
            <label for="login-password" class="form-label">Password</label>
            <input
                type="password"
                id="login-password"
                name="password"
                class="form-control"
            >
        </div>

        <!-- Submit button -->
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
@endsection
