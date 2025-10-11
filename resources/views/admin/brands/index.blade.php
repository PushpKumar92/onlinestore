@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <h3>Brands</h3>
    <button class="btn btn-primary mb-3" id="addBrandBtn">Add Brand</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="brandsTable">
            @foreach($brands as $brand)
            <tr id="brand_{{ $brand->id }}">
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td>
                    <button class="btn btn-sm btn-info editBrandBtn" data-id="{{ $brand->id }}">Edit</button>
                    <button class="btn btn-sm btn-danger deleteBrandBtn" data-id="{{ $brand->id }}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="brandModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="brandForm">
            @csrf
            <input type="hidden" name="brand_id" id="brand_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="brandModalLabel">Add Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" id="brandName" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveBrandBtn">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {

    // Open Add Brand Modal
    $('#addBrandBtn').click(function(){
        $('#brandForm')[0].reset();
        $('#brand_id').val('');
        $('#brandModalLabel').text('Add Brand');

        // Open modal using Bootstrap 5 JS
        var brandModal = new bootstrap.Modal(document.getElementById('brandModal'));
        brandModal.show();
    });

});


    // Submit Add/Edit Brand Form
    $('#brandForm').submit(function(e){
        e.preventDefault();

        let id = $('#brand_id').val();
        let url = id ? '/brands/' + id : '/brands';
        let method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: method,
            data: $(this).serialize(),
            success: function(res){
                // Option 1: Reload table via AJAX (better)
                // Option 2: Simple reload
                location.reload();
            },
            error: function(xhr){
                let errors = xhr.responseJSON?.errors;
                if(errors){
                    let msg = '';
                    $.each(errors, function(key, value){
                        msg += value[0] + "\n";
                    });
                    alert(msg);
                } else {
                    alert(xhr.responseJSON?.message || 'Something went wrong');
                }
            }
        });
    });

    // Open Edit Brand Modal
    $(document).on('click', '.editBrandBtn', function(){
        let id = $(this).data('id');

        $.get('/brands/' + id + '/edit', function(data){
            $('#brand_id').val(data.id);
            $('#brandName').val(data.name);
            $('#brandModalLabel').text('Edit Brand');
            brandModal.show();
        });
    });

    // Delete Brand
    $(document).on('click', '.deleteBrandBtn', function(){
        if(confirm('Are you sure you want to delete this brand?')){
            let id = $(this).data('id');

            $.ajax({
                url: '/brands/' + id,
                type: 'DELETE',
                data: {_token: '{{ csrf_token() }}'},
                success: function(res){
                    $('#brand_' + id).remove();
                    alert('Brand deleted successfully!');
                },
                error: function(xhr){
                    alert(xhr.responseJSON?.message || 'Delete failed');
                }
            });
        }
    });

});
</script>
@endsection
