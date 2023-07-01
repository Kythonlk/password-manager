<!-- resources/views/passwords/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Password List</h1>

        <a href="{{ route('passwords.create') }}" class="btn btn-primary mb-3">Add Password</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($passwords as $password)
                    <tr>
                        <td>{{ $password->category->name }}</td>
                        <td>{{ $password->title }}</td>
                        <td>{{ $password->username }}</td>
                        <td>{{ $password->password }}</td>
                        <td>
                            <a href="{{ route('passwords.edit', $password) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('passwords.destroy', $password) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this password?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No passwords found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
