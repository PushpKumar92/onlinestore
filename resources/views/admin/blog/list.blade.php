@extends('admin.layout.main')
@section('content')
<div class="container mt-4">
   <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold mb-0">All Blogs</h2>

    <a href="{{ route('blogs.addblog') }}" class="btn btn-success">Add New Blog</a>
</div>

@if(session('success'))
<div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
@endif

    
    <!-- Responsive Table -->
    <div class="table-wrapper">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th class="d-none d-md-table-cell">Content</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $index => $blog)
                <tr>
                    <td class="text-center">{{ $index + $blogs->firstItem() }}</td>
                    <td class="text-center">
                        @if($blog->image)
                            <img src="{{ asset('uploads/blogs/' . $blog->image) }}" 
                                 width="80" 
                                 class="img-fluid rounded"
                                 style="max-height: 80px; object-fit: cover;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td class="fw-semibold">{{ Str::limit($blog->title, 50) }}</td>
                    <td class="d-none d-md-table-cell" style="width:280px;">
                        {{ Str::limit(strip_tags($blog->content), 100) }}
                    </td>
                    <td class="text-center">
                        <span class="badge {{ $blog->status == 1 ? 'bg-success' : 'bg-secondary' }}">
                            {{ $blog->status == 1 ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="text-nowrap">{{ $blog->created_at->format('d M, Y') }}</td>
                    <td class="text-center">
                        <a href="{{ route('blogs.edit', $blog->id) }}" 
                           class="btn btn-sm btn-primary me-1 mb-1"
                           title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" 
                              method="POST" 
                              class="d-inline"
                              onsubmit="return confirm('Are you sure you want to deactivate this blog?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger mb-1" title="Deactivate">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No blogs found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        {{ $blogs->links() }}
    </div>
</div>

<!-- Auto-hide success alert -->
<script>
setTimeout(() => {
    const alert = document.getElementById('success-alert');
    if (alert) alert.remove();
}, 3000);
</script>

<style>
.table-wrapper {
    overflow-x: auto;
}
</style>
@endsection