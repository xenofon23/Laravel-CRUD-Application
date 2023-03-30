@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Persons</h1>
                <hr>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="text-right">
                    <a href="{{ route('persons.create') }}" class="btn btn-primary mb-3">Add New person</a>
                </div>
                <form action="{{ route('persons.index') }}" method="get">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control mb-3" placeholder="search" name="q">
                        </div>
                        <div class="col-md-2">
                            <input type="submit" class="form-control mb-3" value="Search">
                        </div>
                    </div>
                </form>
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
                    @foreach ($persons as $person)
                        <tr>
                            <td>{{ $person->id }}</td>
                            <td>{{ $person->name }}</td>
                            <td>{{ $person->surname }}</td>
                            <td>
                                <a href="{{ route('persons.edit', $person->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('persons.destroy', $person->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this person?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $persons->links() !!}
            </div>
        </div>
    </div>
@endsection
