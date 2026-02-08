@extends('layouts.app')

@section('title', $post->post_title)

@section('content')

@include('posts.sidebar')

<div class="container" style="max-width:900px; margin:30px auto;">
<div class="article-header">
   <nav class="breadcrumb">
    <a href="{{ url('/') }}">Home</a> /
    @if(!empty($post->main_categories))
        <a href="#">{{ $post->main_categories }}</a> /
    @endif

    @if(!empty($post->sub_categories))
        <a href="#">{{ $post->sub_categories }}</a> /
    @endif

    @if(!empty($post->more))
        <a href="#">{{ $post->more }}</a>
    @endif
</nav>

    <h1 class="article-title">{{ $post->post_title }}</h1>

    <div class="article-meta">
        <div class="author">
            <img src="{{ asset('assets/img/logo/logo_km.png') }}" alt="Author" class="author-icon" />
            <span>Redaksi</span>
        </div>
        <div class="date-time">
            <i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('l, d F Y H:i:s') }} WIB
        </div>
        <div class="views">
            Dibaca : <span class="views-count">{{ $post->views ?? 0 }}</span> Kali
        </div>
        <div class="print-link">
            <a href="#" onclick="window.print()" title="Cetak"><i class="fa fa-print"></i> Cetak</a>
        </div>
    </div>
</div>


    @if($post->post_image)
    <div>
        <img src="{{ asset('uploads/posts/'.$post->post_image) }}" alt="{{ $post->post_title }}" style="width:100%; border-radius:8px; margin-bottom:30px;" width="400" height="350">
    </div>
    @endif

        {{-- Tombol Share --}}
<div class="d-flex flex-wrap gap-1 mb-4">

    {{-- Facebook --}}
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" 
       class="text-white d-inline-flex align-items-center justify-content-center"
       style="background-color: #3b5998; width: 32px; height: 32px; border-radius: 6px;" 
       target="_blank" title="Facebook">
        <i class="fa-brands fa-facebook-f"></i>
    </a>

    {{-- WhatsApp --}}
    <a href="https://wa.me/?text={{ urlencode($post->post_title . ' ' . Request::fullUrl()) }}" 
       class="text-white d-inline-flex align-items-center justify-content-center"
       style="background-color: #25D366; width: 32px; height: 32px; border-radius: 6px;" 
       target="_blank" title="WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    {{-- Twitter/X --}}
    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($post->post_title) }}" 
   class="text-white d-inline-flex align-items-center justify-content-center"
   style="background-color: #000000; width: 32px; height: 32px; border-radius: 6px;" 
   target="_blank" title="Twitter/X">
    <i class="fa-brands fa-twitter"></i>
    </a>
    {{-- Telegram --}}
    <a href="https://t.me/share/url?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($post->post_title) }}" 
       class="text-white d-inline-flex align-items-center justify-content-center"
       style="background-color: #0088cc; width: 32px; height: 32px; border-radius: 6px;" 
       target="_blank" title="Telegram">
        <i class="fa-brands fa-telegram"></i>
    </a>

    {{-- Instagram --}}
    <a href="https://www.instagram.com/" 
       class="text-white d-inline-flex align-items-center justify-content-center"
       style="background-color: #C13584; width: 32px; height: 32px; border-radius: 6px;" 
       target="_blank" title="Instagram">
        <i class="fa-brands fa-instagram"></i>
    </a>

</div>


    <div style="font-size:18px; line-height:1.7; color:#333;">
        {!! $post->post_content !!}
    </div>
</div>

@include('posts.trending')

@include('posts.articles')
@endsection
