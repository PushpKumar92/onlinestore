@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">All Categories</h2>
        <button type="button" class="btn-1" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            Add New Category
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" id="success-alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Categories Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td class="text-center">
                        @if(!empty($category->image) && file_exists(public_path('uploads/categories/' . $category->image)))
                            <img src="{{ asset('uploads/categories/' . $category->image) }}" 
                                 width="50" height="50" class="img-thumbnail" alt="{{ $category->name }}">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <span class="badge {{ $category->status == 1 ? 'bg-success' : 'bg-secondary' }}">
                            {{ $category->status == 1 ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-warning" 
                                data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}">
                            <i
                                class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <form action="{{ route('category.destroy', $category->id) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this category?')">
                                <i
                                    class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Category Modal -->
                <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Category Name</label>
                                        <input type="text" name="name" class="form-control" 
                                               value="{{ $category->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Slug</label>
                                        <input type="text" name="slug" class="form-control" 
                                               value="{{ $category->slug }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Current Image</label>
                                        @if(!empty($category->image) && file_exists(public_path('uploads/categories/' . $category->image)))
                                            <div class="mb-2">
                                                <img src="{{ asset('uploads/categories/' . $category->image) }}" 
                                                     width="100" class="img-thumbnail" alt="{{ $category->name }}">
                                            </div>
                                        @endif
                                        <input type="file" name="image" class="form-control">
                                        <small class="text-muted">Leave empty to keep current image</small>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                            <input class="form-check-input" type="checkbox" role="switch" 
                                                   name="status" value="1" 
                                                   {{ $category->status == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label fw-medium">Active Status</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-1" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-1">Update Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No categories found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Slug</label>
                        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" 
                               placeholder="Leave empty for auto-generation">
                        @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Category Image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-switch switch-primary d-flex align-items-center gap-3">
                            <input class="form-check-input" type="checkbox" role="switch" 
                                   id="statusSwitch" name="status" value="1" checked>
                            <label class="form-check-label fw-medium" for="statusSwitch">
                                Active Status
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-1" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-1">Create Category</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// Auto-hide success alert after 3 seconds
setTimeout(() => {
    const alert = document.getElementById('success-alert');
    if (alert) {
        alert.classList.remove('show');
        setTimeout(() => alert.remove(), 150);
    }
}, 3000);

// Auto-open modal on validation errors
@if($errors->any())
    document.addEventListener('DOMContentLoaded', function() {
        var addModal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
        addModal.show();
    });
@endif
</script>

@endsection