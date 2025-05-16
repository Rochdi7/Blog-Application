@extends('layout.base')

@section('title', 'Home Page')

@section('content')

    <div class="container my-5">
        <div class="row">
            <!-- Sidebar (Categories) -->
            <div class="col-md-3 mb-4">
                <div class="bg-white border rounded-4 shadow-sm p-4">
                    <h5 class="fw-bold text-uppercase text-secondary mb-3">Categories</h5>
                    <ul class="list-group list-unstyled">
                        <li class="mb-2">
                            <a href="{{ route('home') }}"
                                class="d-block px-2 py-1 rounded text-decoration-none {{ request()->routeIs('home') ? 'bg-primary text-white' : 'text-dark' }}">
                                All Categories
                            </a>
                        </li>
                        @foreach($categories as $category)
                            <li class="mb-2">
                                <a href="{{ route('category.posts', ['slug' => $category->slug]) }}"
                                    class="d-block px-2 py-1 rounded text-decoration-none {{ request()->routeIs('category.posts') && request()->slug === $category->slug ? 'bg-primary text-white' : 'text-dark' }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Posts (Main Content) -->
            <div class="col-md-9">
                @forelse($posts as $post)
                    <div class="card mb-4 shadow-sm border-0 rounded-4 overflow-hidden">

                    @php
    $media = $post->getFirstMedia('featured');
@endphp

@if($media)
    @php
        $shortUuid = substr($media->uuid, 0, 8);
    @endphp

    <img src="{{ route('media.short', [
        'shortUuid' => $shortUuid,
        'id' => $media->id,
        'fileName' => $media->file_name
    ]) }}" alt="{{ $post->title }}" class="img-fluid rounded mb-4">
@endif


                    
                        <div class="card-body">
                            {{-- Title --}}
                            <h4 class="card-title fw-bold text-dark">{{ $post->title }}</h4>

                            {{-- Meta Info --}}
                            <p class="text-muted small mb-2">
                                <i class="far fa-calendar-alt me-1"></i> {{ $post->created_at->format('F j, Y') }}
                                &nbsp;|&nbsp;
                                <i class="fas fa-user me-1"></i> {{ $post->user->name ?? 'Unknown' }}
                            </p>

                            {{-- Excerpt --}}
                            <p class="card-text mb-3">{{ Str::limit(strip_tags($post->content), 140, '...') }}</p>

                            {{-- Category --}}
                            <p class="text-muted small mb-3">
                                <i class="fas fa-tag me-1"></i>
                                <a href="{{ route('category.posts', ['slug' => $post->category->slug]) }}"
                                    class="badge bg-primary text-white text-decoration-none">
                                    {{ $post->category->name }}
                                </a>
                            </p>

                            {{-- Read More --}}
                            <a href="{{ route('post.show', $post) }}" class="btn btn-outline-primary rounded-pill px-4">
                                <i class="fas fa-book-open me-1"></i> Read More
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning text-center">No posts available.</div>
                @endforelse
            </div>
        </div>
    </div>

@endsection