<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('/adm/assets/css/styles.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
</head>
@stack('scripts')
<body>
  <main>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <!-- Sidebar Start -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="/admin/dashboard" class="text-nowrap logo-img">
              <img src="{{ asset('/adm/assets/images/logos/logo.png') }}" alt="Logo" style="height:80px; width:auto; max-width:2000px;" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          @include('admin.nav')
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!--  Sidebar End -->
      <!--  Main wrapper -->
      <div class="body-wrapper">
        <!--  Header Start -->
        @include('admin.header')
        <!--  Header End -->
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
  </main>
  <script src="{{ asset('/adm/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/adm/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/adm/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('/adm/assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('/adm/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('/adm/assets/js/app.min.js') }}"></script>
  <script src="{{ asset('/adm/assets/js/dashboard.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</body>

</html>