@extends('layouts.app')

@section('content')
    <h1 class="mb-3">User List</h1>
    <a href="{{ route('users.create') }}" class="btn btn-outline-success btn-sm mb-4">+ Create</a>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($user->image)
                            <img src="{{ asset('userImages/' . $user->image) }}" alt="{{ $user->name }}" width="50"
                                height="50" class="rounded-circle object-fit-cover">
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?? '—' }}</td>
                    <td>{{ ucfirst($user->gender ?? '—') }}</td>
                    <td>{{ $user->address ?? '—' }}</td>
                    <td>
                        <form action="{{route('users.status', ['id' => $user->id])}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm {{ $user->status ==  1 ? 'btn-success' : 'btn-danger' }}">
                                    {{ $user->status ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                    </td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('users.edit', ['id' => $user->id]) }}"
                            class="btn btn-outline-secondary btn-sm">Edit</a>
                        <form action="{{ route('users.delete', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
