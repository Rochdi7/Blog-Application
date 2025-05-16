@extends('admin.index')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <h3 class="mb-4"> Add New Category</h3>

            @if(session('success'))
                <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                {{-- Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name *</label>
                    <input type="text" name="name" id="name" class="form-control rounded-3 shadow-sm"
                           value="{{ old('name') }}">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Description (optional)</label>
                    <textarea name="description" id="description" class="form-control rounded-3 shadow-sm" rows="4">{{ old('description') }}</textarea>
                </div>

                {{-- Status Switch --}}
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10 d-flex align-items-center">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" id="status" checked>
                            <label class="form-check-label ms-2" for="status">Active</label>
                        </div>
                    </div>
                </div>

                {{-- Buttons --}}
                <button type="submit" class="btn btn-success shadow-sm px-4">Create Category</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary ms-2">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
