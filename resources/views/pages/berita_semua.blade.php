@extends('layouts.app')
@section('title', 'Semua Berita')

@section('content')
@include('posts.sidebar')

<div class="container my-4">
    <h2>Semua Berita</h2>
    @foreach($posts as $post)
        @include('posts.card', ['post' => $post])
    @endforeach

</div>
@endsection
