@extends('admin.index')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <h4 class="mb-4">Edit Permission</h4>

            <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Permission Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ $permission->name }}" required>
                    @error('name') 
                        <small class="text-danger">{{ $message }}</small> 
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Permission</button>
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary ms-2">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
