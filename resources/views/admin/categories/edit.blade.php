@extends('admin.index')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body">
                <h3 class="mb-4">Edit Category</h3>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name *</label>
                        <input type="text" name="name" id="name" class="form-control rounded-3 shadow-sm"
                            value="{{ old('name', $category->name) }}">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control rounded-3 shadow-sm"
                            rows="4">{{ old('description', $category->description) }}</textarea>
                    </div>

                    {{-- Status --}}
                    <div class="mb-4">
                        <label class="form-label d-block">Status</label>
                        <div class="form-check form-switch d-flex align-items-center gap-2">
                            <input class="form-check-input" type="checkbox" name="status" id="status" {{ $category->status ? 'checked' : '' }}>
                            <label class="form-check-label mb-0" for="status">Active</label>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-success shadow-sm px-4">Update Category</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection