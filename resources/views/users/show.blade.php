<!-- resources/views/users/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text">Email: {{ $user->email }}</p>
                <p class="card-text">Created At: {{ $user->created_at }}</p>
                <p class="card-text">Updated At: {{ $user->updated_at }}</p>
            </div>
        </div>

        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary mt-3">Edit</a>

        <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
        </form>
    </div>
@endsection
