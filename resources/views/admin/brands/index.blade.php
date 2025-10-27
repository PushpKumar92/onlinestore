@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">All Brands</h2>
        <!-- Add Brand Button -->
        <button type="button" class="btn btn-1" data-bs-toggle="modal" data-bs-target="#addBrandModal">
            Add New Brand
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
    @endif

    <!-- Brands Table -->
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
            @forelse($brands as $key => $brand)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->slug }}</td>
                <td class="text-center">
                    @if(!empty($brand->image) && file_exists(public_path('uploads/brands/' . $brand->image)))
                    <img src="{{ asset('uploads/brands/' . $brand->image) }}" width="50" class="img-thumbnail"
                        alt="{{ $brand->name }}">
                    @else
                    <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td class="text-center">
                    <span class="badge {{ $brand->status == 1 ? 'bg-success' : 'bg-secondary' }}">
                        {{ $brand->status == 1 ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="text-center">
                    <!-- Edit Button -->
                    <button type="button" class="btn btn-sm btn-warning me-1" data-bs-toggle="modal"
                        data-bs-target="#editBrandModal{{ $brand->id }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <!-- Delete Form -->
                    <form action="{{ route('brands.destroy', $brand->id) }}" method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure you want to delete this brand?')" 
                                class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>

            <!-- Edit Brand Modal -->
            <div class="modal fade @if($errors->has('name.'.$brand->id) || $errors->has('slug.'.$brand->id)) show @endif"
                id="editBrandModal{{ $brand->id }}" tabindex="-1" aria-hidden="true"
                @if($errors->has('name.'.$brand->id) || $errors->has('slug.'.$brand->id)) style="display:block;" @endif>
                <div class="modal-dialog">
                    <form action="{{ route('brands.update', $brand->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Brand</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Brand Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name.' . $brand->id, $brand->name) }}" required>
                                    @error('name.' . $brand->id)
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Slug</label>
                                    <input type="text" name="slug" class="form-control"
                                        value="{{ old('slug.' . $brand->id, $brand->slug) }}" required>
                                    @error('slug.' . $brand->id)
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Brand Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @if($brand->image)
                                    <img src="{{ asset('uploads/brands/' . $brand->image) }}" width="80"
                                        class="mt-2 img-thumbnail">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                        <input class="form-check-input" type="checkbox" role="switch" 
                                               id="editStatusSwitch{{ $brand->id }}" name="status" value="1"
                                               {{ old('status.' . $brand->id, $brand->status) == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label fw-medium" for="editStatusSwitch{{ $brand->id }}">
                                            Active Status
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-1" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-1">Update Brand</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @empty
            <tr>
                <td colspan="6" class="text-center text-muted">No brands found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        {{ $brands->links() }}
    </div>
</div>

<!-- Add Brand Modal -->
<div class="modal fade @if($errors->has('name') || $errors->has('slug')) show @endif" id="addBrandModal"
    tabindex="-1" aria-hidden="true" @if($errors->has('name') || $errors->has('slug')) style="display:block;" @endif>
    <div class="modal-dialog">
        <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Brand Name</label>
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
                        <label class="form-label fw-bold">Brand Image</label>
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
                    <button type="submit" class="btn btn-1">Create Brand</button>
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
var addModal = new bootstrap.Modal(document.getElementById('addBrandModal'));
addModal.show();
@endif
</script>

@endsection