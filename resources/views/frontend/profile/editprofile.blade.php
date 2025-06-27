@extends('frontend.layouts.main')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Profile</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST') {{-- or PUT if using PUT route --}}

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $user->mobile) }}">
                        </div>

                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image</label><br>
                            @if ($user->profile_image)
                            <img src="{{ asset('storage/profile_images/' . $user->profile_image) }}" width="100" class="mb-2">
                            @endif
                            <input type="file" name="profile_image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                        <a href="{{ route('user.profile') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
