@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Role List</h1>
    <a href="{{ route('roles.create') }}" class="btn btn-outline-success btn-sm mb-4">+ Create</a>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Role Name</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @forelse ($role->permissions as $permission)
                                    <span class="badge bg-secondary me-1">{{ $permission->name }}</span>
                                @empty
                                    <span class="text-muted">No permissions</span>
                                @endforelse
                            </td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                                <form action="{{ route('roles.delete', $role->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Delete this role?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No roles found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
