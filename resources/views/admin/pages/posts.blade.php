@extends('layouts.admin')

@section('title', 'Admin - Posts')

@section('content')
<div class="row">
  <div class="row col-12">
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-8">
            <h5 class="card-title">All Posts</h5>
          </div>
          <div class="col-4">
            <input class="form-control" type="search" placeholder="search">
          </div>
        </div>
        <div class="table-responsive">
          <table class="table text-nowrap align-middle mb-0">
            <thead>
              <tr class="border-2 border-bottom border-primary border-0">
                <th>ID</th>
                <th>Title</th>
                <th>URL</th>
                <th>Description</th>
                <th>Content</th>
                <th>Image</th>
                <th>Main Category</th>
                <th>Sub Category</th>
                <th>More</th>
                <th>Status</th>
                <th>Author</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach($posts as $post)
              <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->post_title }}</td>
 <td>{{ $post->post_url }}</td>
      <td>{{ $post->post_description }}</td>
      <td>{{ $post->post_content }}</td>
      <td>
        @if($post->post_image)
          <img src="{{ asset('uploads/posts/'.$post->post_image) }}" alt="img" width="80">

        @else
          <em>No Image</em>
        @endif
      </td>
      <td>{{ $post->main_categories }}</td>
      <td>{{ $post->sub_categories ?? '-' }}</td>
      <td>{{ $post->more }}</td>
      <td>{{ ucfirst($post->post_status) }}</td>
      <td>{{ $post->post_author_id }}</td>
      <td>{{ $post->created_at }}</td>
      <td>{{ $post->updated_at }}</td>
                <td class="text-center">
                  <a href="{{ url('/admin/edit-post/'.$post->id) }}" class="btn btn-info btn-sm">Edit</a>
                  <a href="{{ url('/admin/delete-post/'.$post->id) }}" onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
