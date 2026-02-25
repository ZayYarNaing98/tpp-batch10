@extends('layouts.app')

@section('content')
    <h2 class="mb-3">Category List</h2>
    @can('categoryCreate')
        <a href="{{ route('categories.create') }}" class="btn btn-outline-success btn-sm mb-4">+ Create</a>
    @endcan
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="bg-secondary text-white">ID</th>
                <th class="bg-secondary text-white">NAME</th>
                <th class="bg-secondary text-white">DESCRIPTION</th>
                <th class="bg-secondary text-white">IMAGE</th>
                <th class="bg-secondary text-white">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <img src="{{ asset('categoryImages/' . $category->image) }}" alt="{{ $category->image }}"
                            style="width: 100px; height: auto;">
                    </td>
                    <td class="d-flex">
                        @can('categoryUpdate')
                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                class="btn btn-outline-secondary btn-sm me-2">Edit</a>
                        @endcan
                        @can('categoryDelete')
                            <form action="{{ route('categories.delete', ['id' => $category->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
