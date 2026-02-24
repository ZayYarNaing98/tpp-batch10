@extends('layouts.app')

@section('content')
<h1 class="mb-3">Edit User</h1>
<a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm mb-3">Back to List</a>
<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                @error('phone')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender">
                    <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $user->gender === 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3">{{ $user->address }}</textarea>
                @error('address')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <div>
                    <input type="checkbox" class="form-check-input" id="status" name="status" {{ $user->status ? 'checked' : '' }}>
                    <label class="form-check-label ms-1" for="status">Active</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                @if ($user->image)
                    <div class="mb-2">
                        <img src="{{ asset('userImages/' . $user->image) }}" alt="{{ $user->name }}" width="100" class="rounded-circle">
                    </div>
                @endif
                <input type="file" class="form-control" id="image" name="image">
                <div class="form-text">Leave empty to keep the current image.</div>
                @error('image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Update User</button>
        </form>
    </div>
</div>
@endsection
