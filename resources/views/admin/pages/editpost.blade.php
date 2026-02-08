@extends('layouts.admin')

@section('title', 'Admin - edit Posts')

@section('content')

<div class="row">
  <!-- Kolom Kiri -->
  <div class="col-md-5">
    <div class="card">
      <div class="card-body">
        <form method="POST" action="{{ url('/admin/update-post/' . $post->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="post_title" class="form-control" value="{{ $post->post_title }}">
          </div>

          <div class="mb-3">
            <label class="form-label">URL Slug</label>
            <input type="text" name="post_url" class="form-control" value="{{ $post->post_url }}">
          </div>

          <div class="mb-3">
            <label class="form-label">Deskripsi Singkat</label>
            <input type="text" name="post_description" class="form-control" value="{{ $post->post_description }}">
          </div>

          <div class="mb-3">
            <label class="form-label">Konten</label>
            <textarea name="post_content" rows="5" class="form-control">{{ $post->post_content }}</textarea>
          </div>
                  <div class="mb-3">
          <label class="form-label">Status</label>
          <select name="post_status" class="form-control">
            <option value="populer" {{ $post->post_status == 'populer' ? 'selected' : '' }}>Populer</option>
            <option value="standart" {{ $post->post_status == 'standart' ? 'selected' : '' }}>Standard</option>
            <option value="hot news" {{ $post->post_status == 'hot news' ? 'selected' : '' }}>Hot News</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  

  <!-- Kolom Kanan -->
  <div class="col-md-7">
    <div class="card">
      <div class="card-body">

        <div class="mb-3">
          <label class="form-label">Gambar Saat Ini</label><br>
          @if($post->post_image)
            <img src="{{ asset('uploads/posts/' . $post->post_image) }}" alt="Gambar Post" style="max-width: 200px; max-height: 150px; margin-bottom: 10px;">
          @else
            <p>Tidak ada gambar</p>
          @endif
        </div>

        <div class="mb-3">
          <label class="form-label">Upload Gambar Baru (opsional)</label>
          <input type="file" name="post_image" class="form-control" accept="image/*">
        </div>



        <div class="mb-3">
          <label class="form-label">Kategori Besar</label>
          <select id="main_categories" name="main_categories" class="form-control">
            <option value="Nasional" {{ $post->main_categories == 'Nasional' ? 'selected' : '' }}>Nasional</option>
            <option value="Seputar Riau" {{ $post->main_categories == 'Seputar Riau' ? 'selected' : '' }}>Seputar Riau</option>
            <option value="Hukum dan Kriminal" {{ $post->main_categories == 'Hukum dan Kriminal' ? 'selected' : '' }}>Hukum dan Kriminal</option>
            <option value="Potret Peristiwa" {{ $post->main_categories == 'Potret Peristiwa' ? 'selected' : '' }}>Potret Peristiwa</option>
            <option value="Politik" {{ $post->main_categories == 'Politik' ? 'selected' : '' }}>Politik</option>
            <option value="Pemerintah" {{ $post->main_categories == 'Pemerintah' ? 'selected' : '' }}>Pemerintah</option>
          </select>
        </div>

        <div class="mb-3" id="sub_categories_div" style="{{ $post->main_categories == 'Seputar Riau' ? 'display:block;' : 'display:none;' }}">
          <label class="form-label">Sub Kategori Seputar Riau</label>
          <select id="sub_categories" name="sub_categories" class="form-control">
            @php
              $subOptions = [
                'Kabupaten Bengkalis', 'Kabupaten Indragiri Hilir', 'Kabupaten Indragiri Hulu',
                'Kabupaten Kampar', 'Kabupaten Kepulauan Meranti', 'Kabupaten Kuantan Singingi',
                'Kabupaten Pelalawan', 'Kabupaten Rokan Hilir', 'Kabupaten Rokan Hulu',
                'Kabupaten Siak', 'Kota Dumai', 'Kota Pekanbaru'
              ];
            @endphp
            @foreach($subOptions as $sub)
              <option value="{{ $sub }}" {{ $post->sub_categories == $sub ? 'selected' : '' }}>{{ $sub }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">More</label>
          <select name="more" class="form-control">
            @foreach(['Agama','Olahraga','Ekonomi','Pariwisata','Teknologi','Kesehatan','Life Style'] as $more)
              <option value="{{ $more }}" {{ $post->more == $more ? 'selected' : '' }}>{{ $more }}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('main_categories').addEventListener('change', function() {
    var selected = this.value;
    var subDiv = document.getElementById('sub_categories_div');
    if (selected === 'Seputar Riau') {
      subDiv.style.display = 'block';
    } else {
      subDiv.style.display = 'none';
      document.getElementById('sub_categories').value = '';
    }
  });
</script>

@endsection

