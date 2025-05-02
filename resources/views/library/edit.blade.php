@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Edit Book</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('resources.update', $resource) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" 
                        value="{{ old('title', $resource->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" id="author" class="form-control" 
                        value="{{ old('author', $resource->author) }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $resource->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="shelf" class="form-label">Shelf No</label>
                    <input type="text" name="shelf" id="shelf" class="form-control" 
                        value="{{ old('shelf', $resource->shelf) }}">
                </div>

                <button type="submit" class="btn btn-primary">Update Book</button>
                <a href="{{ route('resources.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
