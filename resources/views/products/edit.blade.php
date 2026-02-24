@extends('layouts.app')

@section('content')
<h1 class="mb-3">Edit Product</h1>
<a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm mb-3">Back to List</a>
<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <div>
                    <input type="checkbox" class="form-check-input" id="status" name="status" {{ $product->status ? 'checked' : '' }}>
                    <label class="form-check-label ms-1" for="status">Active</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                @if ($product->image)
                    <div class="mb-2">
                        <img src="{{ asset('productImages/' . $product->image) }}" alt="{{ $product->name }}" width="150" class="rounded">
                    </div>
                @endif
                <input type="file" class="form-control" id="image" name="image">
                <div class="form-text">Leave empty to keep the current image.</div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Update Product</button>
        </form>
    </div>
</div>
@endsection
