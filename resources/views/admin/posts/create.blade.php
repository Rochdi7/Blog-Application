@extends('admin.index')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <h3 class="mb-4">📝 Add New Post</h3>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
            @endif

            {{-- Form Start --}}
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf

                {{-- Title --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title *</label>
                    <input type="text" name="title" id="title"
                        class="form-control rounded-3 shadow-sm @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" required placeholder="Enter post title"
                        oninvalid="this.setCustomValidity('Please fill out this field')"
                        oninput="this.setCustomValidity('')">
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Slug (Hidden) --}}
                <input type="hidden" name="slug" id="slug" value="{{ old('slug') }}">

                {{-- Featured Image --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Featured Image</label>
                    <input type="file" name="image" id="image"
                        class="form-control rounded-3 shadow-sm @error('image') is-invalid @enderror"
                        accept="image/*">
                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Content --}}
                <div class="mb-3">
                    <label for="content" class="form-label">Content *</label>
                    <textarea name="content" id="content" rows="6"
                        class="form-control rounded-3 shadow-sm @error('content') is-invalid @enderror"
                        required placeholder="Write your post here"
                        oninvalid="this.setCustomValidity('Please fill out this field')"
                        oninput="this.setCustomValidity('')">{{ old('content') }}</textarea>
                    @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Category --}}
                <div class="mb-4">
                    <label for="category_id" class="form-label">Select Category *</label>
                    <select name="category_id" id="category_id"
                        class="form-select rounded-3 shadow-sm @error('category_id') is-invalid @enderror"
                        required oninvalid="this.setCustomValidity('Please select a category')"
                        oninput="this.setCustomValidity('')">
                        <option value="">-- Choose Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- User --}}
                <div class="mb-3">
                    <label for="user_id" class="form-label">Author *</label>
                    <select name="user_id" id="user_id" class="form-select" required>
                        <option value="">-- Select Author --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $post->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Submit --}}
                <div class="d-flex align-items-center gap-3">
                    <button type="submit" class="btn btn-success shadow-sm px-4">
                        <i class="mdi mdi-content-save me-1"></i> Create Post
                    </button>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
