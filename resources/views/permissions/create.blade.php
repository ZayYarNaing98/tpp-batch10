@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Create New Permission</h1>
    <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary btn-sm mb-3">Back to List</a>

    <div class="card" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Permission Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name') }}" placeholder="e.g. productCreate">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-sm">Create Permission</button>
            </form>
        </div>
    </div>
@endsection
