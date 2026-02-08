@extends('layouts.admin')

@section('title', 'Admin - Categories')

@section('content')

<div class="row">
  <div class="col-5 mb-1">
    <div class="card">
      <div class="card-body">
         <form method="POST" action="{{ url('/admin/post-new') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label">Judul</label>
          <input type="text" name="post_title" class="form-control" placeholder="Judul">
          @error('post_title')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">URL Slug</label>
          <input type="text" name="post_url" class="form-control" placeholder="slug-judul">
          @error('post_url')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Deskripsi Singkat</label>
          <input type="text" name="post_description" class="form-control" placeholder="Deskripsi singkat...">
          @error('post_description')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Konten</label>
          <textarea name="post_content" id="post_content" class="form-control"></textarea>
          @error('post_content')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
           <!-- </div> -->
        <!-- </form> -->
        </div>
      </div>
    </div>
  </div>
  <div class="col-7">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-8">
            <!-- Tambahan kolom upload image di sini -->
            <div class="mb-3">
              <label class="form-label">Upload Gambar</label>
              <input type="file" name="post_image" class="form-control" accept="image/*">
              @error('post_image')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <!-- Tambahan kolom kategori besar dan sub kategori -->

          <div class="mb-3">
            <label class="form-label">Kategori Besar</label>
            <select type="text" id="main_categories" name="main_categories" class="form-control" >
                 <option value="">-- Pilih Kategori Besar --</option>
                 <option value="Nasional">Nasional</option>
                 <option value="Seputar Riau">Seputar Riau</option>
                 <option value="Hukum dan Kriminal">Hukum dan Kriminal</option>
                 <option value="Potret Peristiwa">Potret Pariwisata</option>
                 <option value="Politik">Politik</option>
                 <option value="Pemerintah">Pemerintah</option>
             </select>
            @error('main_categories')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

     <div class="mb-3">
  <label class="form-label">Sub Kategori</label>
  <select name="sub_categories" class="form-control">
    <option value="">-- (Opsional) Pilih Sub Kategori --</option>
    <option value="Kabupaten Bengkalis">Kabupaten Bengkalis</option>
    <option value="Kabupaten Indragiri Hilir">Kabupaten Indragiri Hilir</option>
    <option value="Kabupaten Indragiri Hulu">Kabupaten Indragiri Hulu</option>
    <option value="Kabupaten Kampar">Kabupaten Kampar</option>
    <option value="Kabupaten Kepulauan Meranti">Kabupaten Kepulauan Meranti</option>
    <option value="Kabupaten Kuantan Singingi">Kabupaten Kuantan Singingi</option>
    <option value="Kabupaten Pelalawan">Kabupaten Pelalawan</option>
    <option value="Kabupaten Rokan Hilir">Kabupaten Rokan Hilir</option>
    <option value="Kabupaten Rokan Hulu">Kabupaten Rokan Hulu</option>
    <option value="Kabupaten Siak">Kabupaten Siak</option>
    <option value="Kota Dumai">Kota Dumai</option>
    <option value="Kota Pekanbaru">Kota Pekanbaru</option>
  </select>
  @error('sub_categories')
    <div class="text-danger">{{ $message }}</div>
  @enderror
</div>


          <div class="mb-3">
            <label class="form-label">More</label>
            <select type="text" name="more" class="form-control">
                  <option value="" selected>-- Pilih Kategori --</option>
                 <option value="Agama">Agama</option>
                 <option value="Olahraga">Olahraga</option>
                 <option value="Ekonomi">Ekonomi</option>
                 <option value="Pariwisata">Pariwisata</option>
                 <option value="Teknologi">Teknologi</option>
                 <option value="Kesehatan">Kesehatan</option>
                 <option value="Life Style">Life Style</option>
             </select>
             @error('more')
               <div class="text-danger">{{ $message }}</div>
             @enderror
          </div>
           <!-- Tambahkan input status di sini -->
<div class="mb-3">
  <label class="form-label">Status</label>

  <!-- DEFAULT: Hot News -->
  <input type="hidden" name="post_status" value="hot news">

  <!-- Jika dicentang, nilai ini akan MENIMPA hidden -->
  <div class="form-check">
    <input 
      class="form-check-input" 
      type="checkbox" 
      name="post_status" 
      value="populer"
      id="post_status_populer"
    >
    <label class="form-check-label" for="post_status_populer">
      Populer
    </label>
  </div>

  @error('post_status')
    <div class="text-danger">{{ $message }}</div>
  @enderror
</div>

<button type="submit" class="btn btn-success">Simpan</button>
      </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $('#post_content').summernote({
    height: 300,
    placeholder: 'Isi lengkap berita...',
    toolbar: [
      ['style', ['bold', 'italic', 'underline']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['insert', ['link']],
      ['view', ['fullscreen']]
    ]
  });
</script>

@endsection
