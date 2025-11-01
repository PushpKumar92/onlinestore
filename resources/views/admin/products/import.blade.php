@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-file-import"></i> Import Products (CSV)
                    </h4>
                </div>
                <div class="card-body">
                    {{-- Success Message --}}
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    {{-- Warning Message --}}
                    @if(session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> {{ session('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        
                        @if(session('errors') && is_array(session('errors')))
                        <hr>
                        <strong>Errors:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach(session('errors') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endif

                    {{-- Error Message --}}
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-times-circle"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    {{-- Validation Errors --}}
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Validation Errors:</strong>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- Instructions --}}
                    <div class="alert alert-info">
                        <h5 class="alert-heading">
                            <i class="fas fa-info-circle"></i> How to Import Products
                        </h5>
                        <ol class="mb-0">
                            <li>Download the CSV template file below</li>
                            <li>Open it in Excel, Google Sheets, or any spreadsheet software</li>
                            <li>Fill in your product data (follow the sample format)</li>
                            <li>Save the file as CSV format</li>
                            <li>Upload the CSV file using the form below</li>
                        </ol>
                        <hr>
                        <p class="mb-0">
                            <strong>Important:</strong>
                            <ul class="mb-0">
                                <li>Category and Brand names must match existing records in database</li>
                                <li>If SKU Code exists, product will be updated</li>
                                <li>If SKU Code is new/empty, new product will be created</li>
                                <li>Status can be: Active, Inactive, 1, or 0</li>
                            </ul>
                        </p>
                    </div>

                    {{-- Download Template Button --}}
                    <div class="text-center mb-4">
                        <a href="{{ route('products.template') }}" class="btn btn-success btn-lg">
                            <i class="fas fa-download"></i> Download CSV Template
                        </a>
                    </div>

                    <hr>

                    {{-- Import Form --}}
                    <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data" id="importForm">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="file" class="form-label fw-bold">
                                Select CSV File <span class="text-danger">*</span>
                            </label>
                            <input type="file" 
                                   name="file" 
                                   id="file" 
                                   class="form-control @error('file') is-invalid @enderror" 
                                   accept=".csv,.txt"
                                   required>
                            @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">
                                <i class="fas fa-info-circle"></i> Only CSV files are supported (Max: 5MB)
                            </small>
                        </div>

                        {{-- File Preview --}}
                        <div id="filePreview" class="alert alert-secondary d-none mb-4">
                            <h6><i class="fas fa-file-csv"></i> Selected File Details:</h6>
                            <strong>Name:</strong> <span id="fileName"></span><br>
                            <strong>Size:</strong> <span id="fileSize"></span><br>
                            <strong>Type:</strong> <span id="fileType"></span>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <i class="fas fa-upload"></i> Import Products
                            </button>
                            <button type="button" class="btn btn-warning" id="validateBtn">
                                <i class="fas fa-check"></i> Validate File First
                            </button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to Products
                            </a>
                        </div>
                    </form>

                    {{-- Validation Results --}}
                    <div id="validationResults" class="mt-4 d-none">
                        <div class="alert alert-info">
                            <h6><i class="fas fa-clipboard-check"></i> File Validation Results:</h6>
                            <div id="validationContent"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Column Reference Card --}}
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-table"></i> CSV Column Reference
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>Column Name</th>
                                    <th>Required</th>
                                    <th>Data Type</th>
                                    <th>Example</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>name</code></td>
                                    <td><span class="badge bg-danger">Yes</span></td>
                                    <td>Text</td>
                                    <td>Samsung Galaxy S24</td>
                                    <td>Product name (max 255 characters)</td>
                                </tr>
                                <tr>
                                    <td><code>sku_code</code></td>
                                    <td><span class="badge bg-secondary">No</span></td>
                                    <td>Text</td>
                                    <td>SKU001</td>
                                    <td>Unique identifier for update detection</td>
                                </tr>
                                <tr>
                                    <td><code>category</code></td>
                                    <td><span class="badge bg-danger">Yes</span></td>
                                    <td>Text</td>
                                    <td>Electronics</td>
                                    <td>Must match existing category name</td>
                                </tr>
                                <tr>
                                    <td><code>brand</code></td>
                                    <td><span class="badge bg-secondary">No</span></td>
                                    <td>Text</td>
                                    <td>Samsung</td>
                                    <td>Must match existing brand name</td>
                                </tr>
                                <tr>
                                    <td><code>price</code></td>
                                    <td><span class="badge bg-danger">Yes</span></td>
                                    <td>Number</td>
                                    <td>25000</td>
                                    <td>Product price (minimum 0)</td>
                                </tr>
                                <tr>
                                    <td><code>discount</code></td>
                                    <td><span class="badge bg-secondary">No</span></td>
                                    <td>Number</td>
                                    <td>10</td>
                                    <td>Discount percentage (0-100)</td>
                                </tr>
                                <tr>
                                    <td><code>quantity</code></td>
                                    <td><span class="badge bg-danger">Yes</span></td>
                                    <td>Number</td>
                                    <td>50</td>
                                    <td>Stock quantity (minimum 0)</td>
                                </tr>
                                <tr>
                                    <td><code>color</code></td>
                                    <td><span class="badge bg-secondary">No</span></td>
                                    <td>Text</td>
                                    <td>Black, White</td>
                                    <td>Available colors (comma separated)</td>
                                </tr>
                                <tr>
                                    <td><code>sizes</code></td>
                                    <td><span class="badge bg-secondary">No</span></td>
                                    <td>Text</td>
                                    <td>S, M, L, XL</td>
                                    <td>Available sizes (comma separated)</td>
                                </tr>
                                <tr>
                                    <td><code>tags</code></td>
                                    <td><span class="badge bg-secondary">No</span></td>
                                    <td>Text</td>
                                    <td>trending, featured</td>
                                    <td>Product tags (comma separated)</td>
                                </tr>
                                <tr>
                                    <td><code>short_description</code></td>
                                    <td><span class="badge bg-secondary">No</span></td>
                                    <td>Text</td>
                                    <td>Brief product info</td>
                                    <td>Short description for listing</td>
                                </tr>
                                <tr>
                                    <td><code>description</code></td>
                                    <td><span class="badge bg-secondary">No</span></td>
                                    <td>Text</td>
                                    <td>Full product details...</td>
                                    <td>Detailed product description</td>
                                </tr>
                                <tr>
                                    <td><code>status</code></td>
                                    <td><span class="badge bg-secondary">No</span></td>
                                    <td>Text</td>
                                    <td>Active or 1</td>
                                    <td>Active, Inactive, 1, or 0 (default: Active)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// File preview
document.getElementById('file').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const fileSize = (file.size / 1024 / 1024).toFixed(2);
        document.getElementById('fileName').textContent = file.name;
        document.getElementById('fileSize').textContent = fileSize + ' MB';
        document.getElementById('fileType').textContent = file.type || 'text/csv';
        document.getElementById('filePreview').classList.remove('d-none');
        
        // Reset validation results
        document.getElementById('validationResults').classList.add('d-none');
    }
});

// Validate file before import
document.getElementById('validateBtn').addEventListener('click', function() {
    const fileInput = document.getElementById('file');
    const file = fileInput.files[0];
    
    if (!file) {
        alert('Please select a CSV file first!');
        return;
    }
    
    const reader = new FileReader();
    reader.onload = function(e) {
        const content = e.target.result;
        const lines = content.split('\n');
        
        if (lines.length < 2) {
            showValidationResult('error', 'File is empty or has no data rows!');
            return;
        }
        
        const headers = lines[0].split(',').map(h => h.trim().toLowerCase());
        const requiredHeaders = ['name', 'category', 'price', 'quantity'];
        const missingHeaders = requiredHeaders.filter(h => !headers.includes(h));
        
        if (missingHeaders.length > 0) {
            showValidationResult('error', 'Missing required columns: ' + missingHeaders.join(', '));
            return;
        }
        
        const dataRows = lines.length - 1;
        showValidationResult('success', 
            `File validation passed!<br>
            <strong>Total rows:</strong> ${dataRows}<br>
            <strong>Columns found:</strong> ${headers.join(', ')}<br>
            <br>You can now proceed with the import.`
        );
    };
    reader.readAsText(file);
});

function showValidationResult(type, message) {
    const resultsDiv = document.getElementById('validationResults');
    const contentDiv = document.getElementById('validationContent');
    const alertDiv = resultsDiv.querySelector('.alert');
    
    alertDiv.className = 'alert alert-' + (type === 'success' ? 'success' : 'danger');
    contentDiv.innerHTML = message;
    resultsDiv.classList.remove('d-none');
}

// Loading state on submit
document.getElementById('importForm').addEventListener('submit', function() {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Importing...';
});
</script>
@endsection