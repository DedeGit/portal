@extends('layouts.admin')

@section('title', 'Daftar Iklan')

@section('content')
<a href="{{ route('addAds') }}" class="btn btn-primary mb-3">Tambah Iklan</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Posisi</th>
            <th>Status</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ads as $ad)
            <tr>
                <td>{{ $ad->title }}</td>
                <td>{{ $ad->position }}</td>
                <td>{{ $ad->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                <td>
                    @if($ad->image)
                        <img src="{{ asset('uploads/ads/'.$ad->image) }}" alt="{{ $ad->title }}" style="max-width: 100px;">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>
                    <a href="{{ url('/admin/edit-ads/'.$ad->id)  }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ url('/admin/delete-ads/'.$ad->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus iklan ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
