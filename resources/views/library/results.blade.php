@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Search Results for "{{ $query }}"</h1>
    <p>{{ $results->total() }} results found</p>

    @foreach($results as $resource)
        <div class="search-result mb-4 p-3 border rounded">
            <h3>{{ $resource->title }}</h3>
            <p class="text-muted">by {{ $resource->author }}</p>
            <p>{{ Str::limit($resource->description, 150) }}</p>
            
            <div class="d-flex gap-2">
                <!-- View Details link -->
                <!-- <a href="{{ route('resources.show', $resource) }}" class="btn btn-primary btn-sm">
                    View Details
                </a> -->
                
                <!-- Delete button -->
                <form action="{{ route('resources.destroy', $resource) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" 
                            onclick="return confirm('Are you sure you want to delete this book?')">
                        Delete Book
                    </button>
                </form>
            </div>
        </div>
    @endforeach

    <div class="mt-4">
        {{ $results->links() }}
    </div>
</div>
@endsection