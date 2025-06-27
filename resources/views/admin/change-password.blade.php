@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <h2>Change Password</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.change-password') }}" method="POST">
        @csrf

        <div class="mb-3 position-relative">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required>
            <span class="toggle-password" onclick="togglePassword('current_password')"
                style="position:absolute; right:15px; top:40px; cursor:pointer;">
                👁️
            </span>
        </div>

        <div class="mb-3 position-relative">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required>
            <span class="toggle-password" onclick="togglePassword('new_password')"
                style="position:absolute; right:15px; top:40px; cursor:pointer;">
                👁️
            </span>
        </div>

        <div class="mb-3 position-relative">
            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control"
                required>
            <span class="toggle-password" onclick="togglePassword('new_password_confirmation')"
                style="position:absolute; right:15px; top:40px; cursor:pointer;">
                👁️
            </span>
        </div>

        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
</div>

<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    field.type = field.type === 'password' ? 'text' : 'password';
}
</script>
@endsection