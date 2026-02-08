@extends('layouts.admin')

@section('title', 'Edit Iklan')

@section('content')
<form action="{{ url('/admin/update-ads/' . $ad->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Judul Iklan</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $ad->title) }}" required>
        @error('title')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Gambar Saat Ini</label><br>
        @if($ad->image)
            <img src="{{ asset('uploads/ads/' . $ad->image) }}" alt="Gambar Iklan" style="max-width: 200px; margin-bottom: 10px;">
        @else
            <p>Tidak ada gambar</p>
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label">Upload Gambar Baru (opsional)</label>
        <input type="file" name="image" class="form-control" accept="image/*">
        @error('image')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">URL Tujuan</label>
        <input type="text" name="url" class="form-control" value="{{ old('url', $ad->url) }}">
        @error('url')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Posisi Iklan</label>
       <select name="position" class="form-control" required>
    <option value="left" {{ old('position', $ad->position) == 'left' ? 'selected' : '' }}>Sidebar Left</option>
    <option value="right" {{ old('position', $ad->position) == 'right' ? 'selected' : '' }}>Sidebar Right</option>
    <option value="header" {{ old('position', $ad->position) == 'header' ? 'selected' : '' }}>Header</option>
    <option value="footer" {{ old('position', $ad->position) == 'footer' ? 'selected' : '' }}>Footer Slide</option>
</select>
        @error('position')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Mulai Tayang</label>
        <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $ad->start_date ? $ad->start_date->format('Y-m-d') : '') }}">
        @error('start_date')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Berakhir Tayang</label>
        <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $ad->end_date ? $ad->end_date->format('Y-m-d') : '') }}">
        @error('end_date')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <button class="btn btn-success" type="submit">Perbarui Iklan</button>
</form>
@endsection
