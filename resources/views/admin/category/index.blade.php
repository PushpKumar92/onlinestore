@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">All Categories</h2>
        <!-- Add Category Button -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            Add New Category
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
    @endif

    <!-- Categories Table -->
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
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
                    <img src="{{ asset('uploads/categories/' . $category->image) }}" width="50" class="img-thumbnail"
                        alt="{{ $category->name }}">
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
                    <!-- Edit Button -->
                    <button type="button" class="btn btn-sm btn-warning me-1" data-bs-toggle="modal"
                        data-bs-target="#editCategoryModal{{ $category->id }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <!-- Delete Form -->
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure you want to delete this category?')" 
                                class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>

            <!-- Edit Category Modal -->
            <div class="modal fade @if($errors->has('name.'.$category->id) || $errors->has('slug.'.$category->id)) show @endif"
                id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-hidden="true"
                @if($errors->has('name.'.$category->id) || $errors->has('slug.'.$category->id)) style="display:block;" @endif>
                <div class="modal-dialog">
                    <form action="{{ route('category.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
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
                                        value="{{ old('name.' . $category->id, $category->name) }}" required>
                                    @error('name.' . $category->id)
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Slug</label>
                                    <input type="text" name="slug" class="form-control"
                                        value="{{ old('slug.' . $category->id, $category->slug) }}" required>
                                    @error('slug.' . $category->id)
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Category Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @if($category->image)
                                    <img src="{{ asset('uploads/categories/' . $category->image) }}" width="80"
                                        class="mt-2 img-thumbnail">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                        <input class="form-check-input" type="checkbox" role="switch" 
                                               id="editStatusSwitch{{ $category->id }}" name="status" value="1"
                                               {{ old('status.' . $category->id, $category->status) == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label fw-medium" for="editStatusSwitch{{ $category->id }}">
                                            Active Status
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Update Category</button>
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

<!-- Add Category Modal -->
<div class="modal fade @if($errors->has('name') || $errors->has('slug')) show @endif" id="addCategoryModal"
    tabindex="-1" aria-hidden="true" @if($errors->has('name') || $errors->has('slug')) style="display:block;" @endif>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Create Category</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Auto-hide success alert -->
<script>
setTimeout(() => {
    const alert = document.getElementById('success-alert');
    if (alert) alert.remove();
}, 3000);

// Auto-open modal on validation errors
@if($errors->any())
var addModal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
addModal.show();
@endif
</script>

@endsection