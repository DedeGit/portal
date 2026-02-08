@extends('layouts.admin')

@section('title', 'Admin - Users')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('content')

<div class="row">
  <div class="col-5 mb-1">
    <div class="card">
      <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form id="userForm" action="{{ route('users.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-12 mb-2">
              <input type="hidden" id="user_id" name="id">
            </div>
            <div class="col-12 mb-2">
              <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="col-12 mb-2">
              <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="col-12 mb-2">
              <input type="password" name="password" placeholder="Password (kosongkan jika tidak diubah)" class="form-control">
            </div>
            <div class="col-12 mb-2">
              <select name="type" id="type" class="form-control">
                <option value="author" {{ old('type') == "author" ? 'selected' : '' }}>Author</option>
                <option value="admin" {{ old('type') == "admin" ? 'selected' : '' }}>Admin</option>
              </select>
            </div>
            <div class="col-12 mb-2">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-7">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-8">
            <h5 class="card-title">Users</h5>
          </div>
          <div class="col-4">
            <input class="form-control" type="search" placeholder="search">
          </div>
        </div>
        <div class="table-responsive">
          <table class="table text-nowrap align-middle mb-0">
            <thead>
              <tr class="border-2 border-bottom border-primary border-0">
                <th scope="col" class="ps-0">ID</th>
                <th scope="col" class="ps-0">Name</th>
                <th scope="col" class="ps-0">Email</th>
                <th scope="col" class="ps-0">Status</th>
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach($users as $user)
              <tr id="user-row-{{ $user->id }}">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->type }}</td>
                <td class="text-center">
                <button class="btn btn-sm btn-info btn-edit" data-id="{{ $user->id }}">Edit</button>
                <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $user->id }}">Delete</button>
                </td>
              </tr>
              @endforeach
            </tbody>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
  // Reset form state
  function resetForm() {
    $('#userForm')[0].reset();
    $('#user_id').val('');
    $('#userForm').attr('action', "{{ route('users.store') }}");
    $('input[name="_method"]').remove();
  }

  // Handle Edit
  $('.btn-edit').click(function () {
    let id = $(this).data('id');
    $.get('/admin/users/' + id, function (data) {
      $('#user_id').val(data.id);
      $('[name="name"]').val(data.name);
      $('[name="email"]').val(data.email);
      $('#type').val(data.type);
      $('#userForm').attr('action', '/admin/users/' + data.id);
      if (!$('input[name="_method"]').length) {
        $('#userForm').append('<input type="hidden" name="_method" value="PUT">');
      }
    });
  });

  // Handle Delete
  $('.btn-delete').click(function () {
    let id = $(this).data('id');
    Swal.fire({
      title: 'Yakin hapus?',
      text: "Data tidak bisa dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '/admin/users/' + id,
          type: 'DELETE',
          data: { _token: '{{ csrf_token() }}' },
          success: function () {
            $('#user-row-' + id).remove();
            Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success');
          },
          error: function (xhr) {
  console.log('Delete error:', xhr.responseText);
  Swal.fire('Error!', 'Gagal menghapus user.', 'error');
}
        });
      }
    });
  });

  // AJAX submit untuk Add & Update
  $('#userForm').on('submit', function (e) {
    e.preventDefault();

    let form = $(this);
    let url = form.attr('action');
    let method = form.find('input[name="_method"]').val() || 'POST';
    let formData = form.serialize();

    $.ajax({
      url: url,
      type: method,
      data: formData,
      success: function (res) {
        Swal.fire('Berhasil!', 'Data disimpan.', 'success');
        resetForm();
        location.reload(); // Atau update baris tabel langsung
      },
      error: function (err) {
        console.log('Form submission error:', err.responseText);
        Swal.fire('Gagal!', 'Ada kesalahan input.', 'error');
      }
    });
  });
});
</script>
@endpush