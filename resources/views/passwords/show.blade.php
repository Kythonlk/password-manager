<!-- resources/views/passwords/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Password Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category: {{ $password->category->name }}</h5>
                <p class="card-text">Title: {{ $password->title }}</p>
                <p class="card-text">Username: {{ $password->username }}</p>
                <p class="card-text">Password: {{ $password->password }}</p>
                <p class="card-text">Created At: {{ $password->created_at }}</p>
                <p class="card-text">Updated At: {{ $password->updated_at }}</p>
            </div>
        </div>

        <a href="{{ route('passwords.edit', $password) }}" class="btn btn-primary mt-3">Edit</a>

        <form action="{{ route('passwords.destroy', $password) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Are you sure you want to delete this password?')">Delete</button>
        </form>
    </div>
@endsection
