<!-- resources/views/categories/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Category Details</h1>

        <div class="card">
            <div class="card-header">
                <h5>{{ $category->name }}</h5>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $category->id }}</p>
                <p><strong>Name:</strong> {{ $category->name }}</p>
                <p><strong>Created At:</strong> {{ $category->created_at }}</p>
                <p><strong>Updated At:</strong> {{ $category->updated_at }}</p>
            </div>
        </div>

        <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Edit</a>

        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
        </form>
    </div>
@endsection
