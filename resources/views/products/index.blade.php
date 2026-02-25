@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Product List</h1>
    @can('productCreate')
        <a href="{{ route('products.create') }}" class="btn btn-outline-success btn-sm mb-4">+ Create</a>
    @endcan
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($products as $product)
            <div class="col">
                <div class="card h-100">
                    @if ($product->image)
                        <img src="{{ asset('productImages/' . $product->image) }}" class="card-img-top"
                            alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">Category: {{ $product->category->name }}</p>
                        <p class="card-text text-muted">{{ $product->description }}</p>
                        <p class="card-text fw-bold">Price: {{ $product->price }}</p>
                        <p class="card-text fw-bold {{ $product->status === 1 ? 'text-success' : 'text-danger' }}">
                            {{ $product->status == 1 ? 'Active' : 'Expired' }}
                        </p>
                    </div>
                    <div class="card-footer d-flex gap-2">
                        @can('productUpdate')
                            <a href="{{ route('products.edit', ['id' => $product->id]) }}"
                                class="btn btn-outline-secondary btn-sm">Edit</a>
                        @endcan
                        @can('productDelete')
                            <form action="{{ route('products.delete', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        @endcan

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
