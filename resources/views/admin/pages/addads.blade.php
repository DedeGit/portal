@extends('layouts.admin')

@section('title', 'Tambah Iklan')

@section('content')
<form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label">Judul Iklan</label>
        <input type="text" name="title" class="form-control"  required>
        @error('title')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Gambar Iklan</label>
        <input type="file" name="image" class="form-control" accept="image/*">
        @error('image')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">URL Tujuan</label>
        <input type="text" name="url" class="form-control" >
        @error('url')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

<div class="mb-3">
    <label class="form-label">Posisi Iklan</label>
    <select name="position" class="form-control" required>
        <option value="footer" selected>Footer Slide</option>
        <option value="left" >Sidebar Left</option>
        <option value="right" >Sidebar Right</option>
        <option value="header">Header</option>
    </select>
    @error('position')<small class="text-danger">{{ $message }}</small>@enderror
</div>

    <div class="mb-3">
        <label class="form-label">Tanggal Mulai Tayang</label>
        <input type="date" name="start_date" class="form-control" >
        @error('start_date')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Berakhir Tayang</label>
        <input type="date" name="end_date" class="form-control" >
        @error('end_date')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <button class="btn btn-primary" type="submit">Simpan Iklan</button>
</form>
@endsection
