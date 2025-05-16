@extends('admin.index')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <h4 class="mb-4">Permissions Management</h4>

            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary">Add New Permission</a>

                <form method="GET" action="{{ route('admin.permissions.index') }}" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search Permissions">
                    <button type="submit" class="btn btn-secondary">Search</button>
                </form>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">No permissions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-end">
                {{ $permissions->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
