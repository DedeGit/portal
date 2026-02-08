@extends('layouts.app')

@section('content')
<div class="container py-4">

  <h4 class="mb-3">Hasil Filter</h4>

  @forelse($posts as $post)
    <div class="post-item mb-3">
      <h5>{{ $post->post_title }}</h5>
      <small>{{ $post->created_at->format('d F Y') }}</small>
    </div>
  @empty
    <p>Tidak ada berita sesuai filter.</p>
  @endforelse

</div>
@endsection
