@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Book Details</h2>
        </div>
        <div class="card-body">
            <h4>Title:</h4>
            <p>{{ $resource->title }}</p>

            <h4>Author:</h4>
            <p>{{ $resource->author }}</p>

            <h4>Description:</h4>
            <p>{{ $resource->description }}</p>

            <h4>Shelf No:</h4>
            <p>{{ $resource->shelf ?? 'Not assigned' }}</p>

            <a href="{{ route('resources.index') }}" class="btn btn-primary mt-3">Back to List</a>
        </div>
    </div>
</div>
@endsection
