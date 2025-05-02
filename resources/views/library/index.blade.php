@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center mb-0">Library Search</h1>
            </div>
            
            <div class="card-body">
                <!-- Search Form (accessible to all) -->
                <form action="{{ route('resources.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" 
                               class="form-control" 
                               name="query" 
                               placeholder="Search by title, author, or description..."
                               value="{{ $searchTerm ?? '' }}"
                               required>
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Search
                        </button>
                        @if($searchTerm)
                            <a href="{{ route('resources.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Clear
                            </a>
                        @endif
                    </div>
                </form>

                @if($searchTerm && $resources->isEmpty())
                    <div class="alert alert-info text-center">
                        No books found matching your search.
                    </div>
                @endif

                @if($resources->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th>Actions</th> <!-- Always show actions because everyone can view -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resources as $resource)
                            <tr>
                                <td>{{ $resource->title }}</td>
                                <td>{{ $resource->author }}</td>
                                <td>{{ Str::limit($resource->description, 50) }}</td>
                                <td>
                                    <!-- View button for everyone -->
                                    <a href="{{ route('resources.show', $resource) }}" 
                                       class="btn btn-sm btn-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    @auth <!-- Only admin can edit/delete -->
                                    <a href="{{ route('resources.edit', $resource) }}" 
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('resources.destroy', $resource) }}" 
                                          method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                title="Delete" onclick="return confirm('Delete this book?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @endauth
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center mt-3">
                    {{ $resources->appends(['query' => $searchTerm])->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
