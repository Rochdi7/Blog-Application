@extends('admin.index')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body">

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0">All Posts</h3>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary shadow-sm">
                        <i class="mdi mdi-plus-circle-outline me-1"></i> Add New Post
                    </a>
                </div>

                {{-- Success message --}}
                @if(session('success'))
                    <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
                @endif

                {{-- Table --}}
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>

                                    {{-- Image --}}
                                    <td style="width: 80px;">
                                        <img src="{{ $post->getFirstMediaUrl('featured') ?: asset('assets/images/default.jpg') }}"
                                            alt="{{ $post->title }}" class="img-thumbnail rounded"
                                            style="height: 50px; width: 70px; object-fit: cover;">
                                    </td>

                                    {{-- Title --}}
                                    <td style="max-width: 150px;" class="text-truncate" title="{{ $post->title }}">
                                        {{ $post->title }}
                                    </td>

                                    {{-- Slug --}}
                                    <td style="max-width: 120px;" class="text-truncate" title="{{ $post->slug }}">
                                        {{ $post->slug }}
                                    </td>

                                    {{-- Content Preview --}}
                                    <td style="max-width: 200px;" class="text-truncate"
                                        title="{{ strip_tags($post->content) }}">
                                        {{ Str::limit(strip_tags($post->content), 80) }}
                                    </td>

                                    <td>{{ $post->category->name ?? '—' }}</td>
                                    <td>{{ $post->user->name ?? 'Unknown' }}</td>
                                    <td class="text-muted">{{ $post->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="text-muted">{{ $post->updated_at->format('Y-m-d H:i') }}</td>

                                    {{-- Actions --}}
                                    <td class="text-center">
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-warning me-1">
                                            <i class="mdi mdi-pencil-outline"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                            class="d-inline-block"
                                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="mdi mdi-delete-outline"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center text-muted">No posts found.</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>


@endsection