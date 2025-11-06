@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">All Meta Tags</h2>
        <button type="button" class="btn btn-1" data-bs-toggle="modal" data-bs-target="#addMetaTagModal">
            Add New Meta Tag
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" id="success-alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Meta Tags Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Page Name</th>
                    <th>Meta Title</th>
                    <th>Meta Tags</th>
                    <th>Meta Description</th>
                    <th>Meta Keywords</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($metaTags as $meta)
                <tr>
                    <td>{{ $meta->id }}</td>
                    <td>{{ $meta->page_name }}</td>
                    <td>{{ $meta->meta_title }}</td>
                    <td>{{ $meta->meta_tags}}</td>
                    <td>{{ $meta->meta_description }}</td>
                    <td>{{ $meta->meta_keywords }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#editMetaModal{{ $meta->id }}">
                            <i
                                class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <form action="{{ route('meta-tags.destroy', $meta->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this meta tag?')"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Meta Modal -->
                <div class="modal fade" id="editMetaModal{{ $meta->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('meta-tags.update', $meta->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Meta Tag</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Page Name</label>
                                        <input type="text" name="page_name" class="form-control"
                                            value="{{ $meta->page_name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control"
                                            value="{{ $meta->meta_title }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Meta Tags</label>
                                        <input type="text" name="meta_tags" class="form-control"
                                            value="{{ $meta->meta_tags }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Meta Description</label>
                                        <textarea name="meta_description" class="form-control"
                                            rows="3">{{ $meta->meta_description }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Meta Keywords</label>
                                        <textarea name="meta_keywords" class="form-control"
                                            rows="2">{{ $meta->meta_keywords }}</textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-1"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-1">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No meta tags found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Meta Tag Modal -->
<div class="modal fade" id="addMetaTagModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('meta-tags.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Meta Tag</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Page Name</label>
                        <input type="text" name="page_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Meta Tags</label>
                        <input type="text" name="meta_tags" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Meta Keywords</label>
                        <textarea name="meta_keywords" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// Auto-hide success alert
setTimeout(() => {
    const alert = document.getElementById('success-alert');
    if (alert) alert.remove();
}, 3000);
</script>

@endsection