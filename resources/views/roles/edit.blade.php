@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Edit Role</h1>
    <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary btn-sm mb-3">Back to List</a>

    <div class="card" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Role Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $role->name) }}">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Assign Permissions</label>
                    @if ($permissions->isEmpty())
                        <p class="text-muted">No permissions available. Please create permissions first.</p>
                    @else
                        <div class="border rounded p-3" style="max-height: 300px; overflow-y: auto;">
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        name="permissions[]"
                                        value="{{ $permission->name }}"
                                        id="perm_{{ $permission->id }}"
                                        {{ in_array($permission->name, old('permissions', $role->permissions->pluck('name')->toArray())) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="perm_{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Update Role</button>
            </form>
        </div>
    </div>
@endsection
