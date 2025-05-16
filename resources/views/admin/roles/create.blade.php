@extends('admin.index')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body">
                <h4 class="mb-4">Add New Role</h4>

                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Role Name *</label>
                        <input type="text" name="name" class="form-control" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="permissions" class="form-label">Permissions</label>
                        <div class="row">
                            @foreach($permissions as $permission)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]"
                                            value="{{ $permission->name }}" id="perm_{{ $permission->id }}">
                                        <label class="form-check-label"
                                            for="perm_{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Save Role
                    </button>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary ms-2">
                        <i class="bi bi-arrow-left"></i> Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection