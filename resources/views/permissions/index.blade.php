@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Permission List</h1>
    <a href="{{ route('permissions.create') }}" class="btn btn-outline-success btn-sm mb-4">+ Create</a>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Permission Name</th>
                        <th>Guard</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permissions as $permission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                                <form action="{{ route('permissions.delete', $permission->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Delete this permission?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No permissions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
