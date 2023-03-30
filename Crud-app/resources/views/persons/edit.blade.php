@extends('layouts.app')

@section('title', 'Edit Person')

@section('content')
    <div class="container">
        <h1>Edit person</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('persons.update', $person->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $person->name) }}" required>
            </div>

            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname', $person->surname) }}" required>
            </div>



            <button type="submit" class="btn btn-primary">Update person</button>
        </form>
    </div>
@endsection
