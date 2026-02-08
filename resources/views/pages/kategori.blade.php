@extends('layouts.app')

@section('content')
<div class="container">
  <h3>
    @isset($main) {{ $main }} @endisset
    @isset($sub) - {{ $sub }} @endisset
    @isset($more) {{ $more }} @endisset
    @isset($status)
  <h3>Status: {{ ucfirst($status) }}</h3>
@endisset

  </h3>

  @forelse($posts as $post)
    <div class="news-item">
      <h4>
        <a href="{{ route('post.show', $post->post_url) }}">
          {{ $post->post_title }}
        </a>
      </h4>
      <p>{{ $post->post_description }}</p>
    </div>
  @empty
    <p>Tidak ada artikel.</p>
  @endforelse
</div>
@endsection
