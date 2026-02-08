@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h4 class="mb-4">
        Hasil pencarian: <strong>"{{ $q }}"</strong>
    </h4>

    @forelse($artikels as $item)
        <div class="mb-4">
            <h5>{{ $item->post_title }}</h5>

            <p>
                {{ \Illuminate\Support\Str::limit(strip_tags($item->post_content), 150) }}
            </p>

            <a href="{{ route('post.show', $item->post_url) }}" class="read-more">
                Baca selengkapnya →
            </a>
        </div>
        <hr>
    @empty
        <p>Tidak ada artikel ditemukan.</p>
    @endforelse

    {{ $artikels->links() }}

</div>
@endsection
