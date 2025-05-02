@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Add New Book</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('resources.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" id="author" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="shelf" class="form-label">Shelf No</label>
                    <input type="text" name="shelf" id="shelf" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Add Book</button>
                <a href="{{ route('resources.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
