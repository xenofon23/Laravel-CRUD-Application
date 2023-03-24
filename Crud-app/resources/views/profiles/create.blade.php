@extends('layouts.app')

@section('title', 'Create Profile')

@section('content')
    <div class="container">
        <h1>Create Profile</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profiles.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="name">surname:</label>
                <input type="text" name="surname" id="name" class="form-control" value="{{ old('surname') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Profile</button>
        </form>
    </div>
@endsection
