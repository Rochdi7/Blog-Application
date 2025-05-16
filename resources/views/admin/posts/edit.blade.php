@extends('admin.index')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <h3 class="mb-4">✏️ Edit Post</h3>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
            @endif

            {{-- Edit Form --}}
            <form method="POST"
                  action="{{ route('admin.posts.update', $post) }}"
                  enctype="multipart/form-data"
                  novalidate>
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title *</label>
                    <input type="text" name="title" id="title"
                        class="form-control rounded-3 shadow-sm @error('title') is-invalid @enderror"
                        value="{{ old('title', $post->title) }}" required>
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Slug (Hidden) --}}
                <input type="hidden" name="slug" id="slug" value="{{ old('slug', $post->slug) }}">

                {{-- Featured Image --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Upload New Image</label>
                    <input type="file" name="image" id="image"
                        class="form-control rounded-3 shadow-sm @error('image') is-invalid @enderror"
                        accept="image/*">
                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Show Existing Image --}}
                @if($post->getFirstMediaUrl('featured'))
                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        <img src="{{ $post->getFirstMediaUrl('featured') }}"
                             alt="{{ $post->title }}"
                             class="img-thumbnail rounded shadow"
                             style="max-height: 200px;">
                    </div>
                @endif

                {{-- Content --}}
                <div class="mb-3">
                    <label for="content" class="form-label">Content *</label>
                    <textarea name="content" id="content" rows="6"
                        class="form-control rounded-3 shadow-sm @error('content') is-invalid @enderror"
                        required>{{ old('content', $post->content) }}</textarea>
                    @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Category --}}
                <div class="mb-4">
                    <label for="category_id" class="form-label">Select Category *</label>
                    <select name="category_id" id="category_id"
                        class="form-select rounded-3 shadow-sm @error('category_id') is-invalid @enderror" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Author --}}
                <div class="mb-3">
                    <label for="user_id" class="form-label">Author *</label>
                    <select name="user_id" id="user_id"
                            class="form-select rounded-3 shadow-sm @error('user_id') is-invalid @enderror" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Submit --}}
                <div class="d-flex align-items-center gap-3">
                    <button type="submit" class="btn btn-success shadow-sm px-4">
                        <i class="mdi mdi-content-save me-1"></i> Update Post
                    </button>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
