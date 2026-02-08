@extends('layouts.login')

@section('title', 'Admin Login')

@section('content')

<div class="page-wrapper d-flex align-items-center justify-content-center"
     style="
       min-height: 100vh;
       background-image: url('{{ asset('assets/img/logo/logo2_footer.png') }}');
       background-size: cover;
       background-position: center;
       background-repeat: no-repeat;
     ">

  <div class="card shadow-lg border-0 p-4"
     style="
       width: 100%;
       max-width: 420px;
       background: rgba(255, 255, 255, 0.85);
       backdrop-filter: blur(6px);
       border-radius: 12px;
     ">

    <div class="mb-3">
  <a href="{{ url('/') }}" class="text-decoration-none text-dark">
    ← Kembali ke Home
  </a>
</div>
  <div class="text-center mb-4">     
      <h5 class="mt-3">Welcome Back!</h5>
      <p class="text-muted">Login to your admin panel</p>
    </div>

    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="admin@example.com" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
      <!-- <div class="text-end mt-2">
        <a href="#" class="text-decoration-none text-primary">Forgot password?</a>
      </div> -->
    </form>
  </div>
</div>

@endsection
