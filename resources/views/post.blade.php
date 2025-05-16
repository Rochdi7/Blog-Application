@extends('layout.base')

@section('title', $post->title)

@section('content')
<link href="{{ asset('assets/css/post.css') }}" rel="stylesheet">

<style>
    .post-content p {
        margin-bottom: 1.5rem;
        font-size: 1.15rem;
        color: #374151;
    }

    .post-meta {
        color: #6b7280;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }

    .post-meta i {
        margin-right: 6px;
    }

    .back-btn {
        border: 1px solid #0ea5e9;
        color: #0ea5e9;
        padding: 10px 22px;
        border-radius: 30px;
        font-weight: 500;
        transition: 0.3s ease;
        display: inline-block;
    }

    .back-btn:hover {
        background-color: #0ea5e9;
        color: white;
    }

    .post-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: #1f2937;
    }
</style>

<div class="container" style="max-width: 860px;">
    {{-- Featured Image --}}
    @php
        $media = $post->getFirstMedia('featured');
        $shortUuid = $media ? substr($media->uuid, 0, 8) : null;
    @endphp

    @if ($media)
        <img src="{{ route('media.short', [
            'shortUuid' => $shortUuid,
            'id' => $media->id,
            'fileName' => $media->file_name
        ]) }}" alt="{{ $post->title }}"
        class="img-fluid w-100 mb-4 rounded"
        style="object-fit: cover; max-height: 460px;">
    @endif

    {{-- Title --}}
    <h1 class="post-title">{{ $post->title }}</h1>

    {{-- Meta Info --}}
    <div class="post-meta d-flex flex-wrap gap-3">
        <span><i class="fas fa-user"></i> {{ $post->user->name ?? 'Unknown' }}</span>
        <span><i class="far fa-calendar-alt"></i> {{ $post->created_at->format('F j, Y') }}</span>
        <span><i class="fas fa-tag"></i>
            <a href="{{ route('category.posts', ['slug' => $post->category->slug]) }}"
               class="badge bg-primary text-white text-decoration-none">
                {{ $post->category->name }}
            </a>
        </span>
    </div>

    {{-- Content --}}
    <div class="post-content">
        {!! $post->content !!}
    </div>

    {{-- Back Button --}}
    <a href="{{ route('home') }}" class="back-btn mt-4">
        <i class="fas fa-arrow-left me-1"></i> Back to Blog
    </a>
</div>
@endsection
