@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Profiles</h1>
                <hr>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="text-right">
                    <a href="{{ route('profiles.create') }}" class="btn btn-primary mb-3">Add New Profile</a>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->id }}</td>
                            <td>{{ $profile->name }}</td>
                            <td>{{ $profile->surname }}</td>
                            <td>
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this profile?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $profiles->links() !!}
            </div>
        </div>
    </div>
@endsection
