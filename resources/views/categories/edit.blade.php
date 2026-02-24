@extends('layouts.app')

@section('content')
<h2 class="mb-3">Edit Category</h2>
<a href="{{ route('categories.index') }}" class="btn btn-outline-secondary btn-sm mb-3">Back to list</a>
<div class="card" style="max-width: 500px;">
    <div class="card-body">
        <form action="{{ route('categories.update', [$category->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}" id="name" name="name" />
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Category Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" value="{{ $category->description }}" id="description" name="description" />
                @error('description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>
    </div>
</div>
@endsection
