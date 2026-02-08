@extends('layouts.app')

@section('title', 'Kabar Monitor')


@section('content')

@include('posts.trending')

@include('posts.sidebar')

@include('posts.weekly2')

@include('posts.articles')

<!-- @include('posts.youtube') -->


@endsection