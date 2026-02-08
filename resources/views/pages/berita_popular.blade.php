@extends('layouts.app')
@section('title', 'Berita Populer dan Paling Banyak Dilihat')

@section('content')
@include('posts.sidebar')

<div class="container my-4">

    {{-- Bagian 1: Berita Populer --}}
    <h2>Berita Populer</h2>
    @forelse($posts as $post)
    <div class="row border-bottom pb-3 mb-3">
        <div class="col-md-9">
            <span class="text-success small text-uppercase fw-bold">
                {{ strtoupper($post->main_categories ?? 'BERITA') }}
            </span>
            <h5 class="mt-1 mb-1">
                <a href="{{ route('post.show', $post->post_url) }}" class="text-dark">
                    {{ $post->post_title }}
                </a>
            </h5>
            <small class="text-muted">
                <i class="fa fa-calendar"></i> 
                {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('l, d F Y - H:i:s') }} WIB
            </small>
            <p class="mb-2 mt-2">
                {{ \Illuminate\Support\Str::limit(strip_tags($post->post_description), 120) }}
            </p>
        </div>
        <div class="col-md-3">
            @if($post->post_image)
            <img src="{{ asset('uploads/posts/'.$post->post_image) }}" class="img-fluid rounded" alt="{{ $post->post_title }}">
            @endif
        </div>
    </div>
    @empty
    <p class="text-muted">Tidak ada berita populer ditemukan.</p>
    @endforelse

    {{-- Bagian 2: Paling Banyak Dilihat --}}
    <h2 class="mt-5">Paling Banyak Dilihat</h2>
    @forelse($topViewedPosts as $post)
    <div class="row border-bottom pb-3 mb-3">
        <div class="col-md-9">
            <span class="text-primary small text-uppercase fw-bold">
                {{ strtoupper($post->main_categories ?? 'BERITA') }}
            </span>
            <h5 class="mt-1 mb-1">
                <a href="{{ route('post.show', $post->post_url) }}" class="text-dark">
                    {{ $post->post_title }}
                </a>
            </h5>
            <small class="text-muted">
                <i class="fa fa-eye"></i> {{ $post->views }} views &nbsp; | &nbsp;
                <i class="fa fa-calendar"></i> 
                {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('l, d F Y - H:i:s') }} WIB
            </small>
            <p class="mb-2 mt-2">
                {{ \Illuminate\Support\Str::limit(strip_tags($post->post_description), 120) }}
            </p>
        </div>
        <div class="col-md-3">
            @if($post->post_image)
            <img src="{{ asset('uploads/posts/'.$post->post_image) }}" class="img-fluid rounded" alt="{{ $post->post_title }}">
            @endif
        </div>
    </div>
    @empty
    <p class="text-muted">Tidak ada berita dengan view tinggi.</p>
    @endforelse

    {{-- Tombol Lihat Semua --}}
    <div class="text-center mt-4">
        <a href="{{ route('berita.semua') }}" class="btn btn-outline-primary">
            Lihat Semua Berita
        </a>
    </div>

</div>
@endsection
