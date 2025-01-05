@extends('layout')

@section('content')
    <h1>{{ $title }}</h1>

    <!-- Display error message if there are validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">Please fix the errors!</div>
    @endif

    <!-- Form for creating or editing an author -->
    <form method="post" action="{{ $author->exists ? '/authors/patch/' . $author->id : '/authors/put' }}">
        @csrf
        <div class="mb-3">
            <label for="author-name" class="form-label">Author Name</label>
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="author-name"
                name="name"
                value="{{ old('name', $author->name) }}" <!-- Pre-fill input for edit -->
            >
            <!-- Validation error message -->
            @error('name')
                <p class="invalid-feedback">{{ $errors->first('name') }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
