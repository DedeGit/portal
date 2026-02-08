<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/ticker-style.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/slicknav.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/fontawesome-all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/sidebar.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

</head>


<body>
  <!-- GLOBAL MOBILE HAMBURGER -->
<button id="globalHamburger" class="global-hamburger d-md-none">
  <i class="fas fa-bars"></i>
</button>

<!-- OVERLAY -->
<div id="sidebarOverlay"></div>

<!-- MOBILE SIDEBAR -->
<div class="mobile-sidebar d-md-none">

  <!-- PANEL UTAMA -->
  <div class="mobile-panel main-panel active">

    <div class="mobile-logo">
      <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Kabar Monitor">
    </div>

    <ul class="mobile-nav">
      <li><a href="/">Home</a></li>

      <li>        
        <a class="open-panel" data-target="riau" style="color:#fff;"> Seputar Riau <span>›</span> </a>
      </li>

      <li><a href="/kategori/Hukum-dan-Kriminal">Hukrim</a></li>
      <li><a href="/kategori/Potret-Peristiwa">Potret Peristiwa</a></li>
      <li><a href="/kategori/Politik">Politik</a></li>
      <li><a href="/kategori/Pemerintah">Pemerintah</a></li>

      <li>
        <a class="open-panel" data-target="kategori" style="color:#fff;">Kategori <span>›</span></a>
      </li>

      <li>
        <a class="open-panel" data-target="more" style="color:#fff;">More <span>›</span></a>
        
      </li>

      <!-- SEARCH ICON (TETAP ADA) -->
      <li class="menu-search">
        <a href="#" class="openSearch">
          <i class="fas fa-search"></i>
        </a>
      </li>
      
    </ul>
  </div>

  <!-- PANEL RIAU -->
  <div class="mobile-panel sub-panel" id="panel-riau">
    <div class="back-btn">‹ Kembali</div>
    <ul class="mobile-subnav">
                        <li><a href="/kategori/Seputar-Riau/Kabupaten-Bengkalis">Kabupaten Bengkalis</a></li>
                        <li><a href="/kategori/Seputar-Riau/Kabupaten-Indragiri-Hilir">Kabupaten Indragiri Hilir</a></li>
                        <li><a href="/kategori/Seputar-Riau/Kabupaten-Indragiri-Hulu">Kabupaten Indragiri Hulu</a></li>
                        <li><a href="/kategori/Seputar-Riau/Kabupaten-Kampar">Kabupaten Kampar</a></li>
                        <li><a href="/kategori/Seputar-Riau/Kabupaten-Kepulauan-Meranti">Kabupaten Kepulauan Meranti</a></li>
                        <li><a href="/kategori/Seputar-Riau/Kabupaten-Kuantan-Singingi">Kabupaten Kuantan Singingi</a></li>
                        <li><a href="/kategori/Seputar-Riau/Kabupaten-Pelalawan">Kabupaten Pelalawan</a></li>
                        <li><a href="/kategori/Seputar-Riau/Kabupaten-Rokan-Hilir">Kabupaten Rokan Hilir</a></li>
                        <li><a href="/kategori/Seputar-Riau/Kabupaten-Rokan-Hulu">Kabupaten Rokan Hulu</a></li>
                        <li><a href="/kategori/Seputar-Riau/Kabupaten-Siak">Kabupaten Siak</a></li>
                        <li><a href="/kategori/Seputar-Riau/Kota-Dumai">Kota Dumai</a></li>
                        <li><a href="/kategori/Seputar-Riau/Kota-Pekanbaru">Kota Pekanbaru</a></li>
    </ul>
  </div>

  <!-- PANEL KATEGORI -->
  <div class="mobile-panel sub-panel" id="panel-kategori">
    <div class="back-btn">‹ Kembali</div>
    <ul class="mobile-subnav">
      <li><a href="/status/populer">Populer</a></li>
      <li><a href="/status/hot-news">Hot News</a></li>
    </ul>
  </div>

  <!-- PANEL MORE -->
  <div class="mobile-panel sub-panel" id="panel-more">
    <div class="back-btn">‹ Kembali</div>
    <ul class="mobile-subnav">
                        <li><a href="/more/Nasional">Nasional</a></li>
                        <li><a href="/more/Agama">Agama</a></li>
                        <li><a href="/more/Olahraga">Olahraga</a></li>
                        <li><a href="/more/Ekonomi">Ekonomi</a></li>
                        <li><a href="/more/Pariwisata">Pariwisata</a></li>
                        <li><a href="/more/Teknologi">Teknologi</a></li>
                        <li><a href="/more/Kesehatan">Kesehatan</a></li>
                        <li><a href="/more/Life-Style">Life Style</a></li>
    </ul>
  </div>

</div>


</div>


<div id="pageWrapper">
  {{-- Header --}}
  @include('partials.header')

  {{-- Principal --}}
  <main>
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('partials.footer')
</div>

<!-- <script>
$(function () {
  $('#navigation').slicknav({
    prependTo: ".mobile_menu",
    label: '',
    closeOnClick: true
  });
});

</script> -->
<div id="searchOverlay">
  <div class="search-overlay-inner">
    <form action="{{ route('search') }}" method="GET">
      <input
        type="text"
        name="q"
        placeholder="Cari berita..."
        required
        autofocus
      >
      <button type="submit">
        <i class="fas fa-search"></i>
      </button>
    </form>

    <span id="closeSearch">&times;</span>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const openButtons = document.querySelectorAll('.openSearch');
  const overlay = document.getElementById('searchOverlay');
  const closeBtn = document.getElementById('closeSearch');

  if (!overlay || !closeBtn) return;

  openButtons.forEach(btn => {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      overlay.classList.add('active');
    });
  });

  closeBtn.addEventListener('click', function () {
    overlay.classList.remove('active');
  });
});
</script>


<script>
document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.getElementById("globalHamburger");
  const sidebar = document.querySelector(".mobile-sidebar");
  const overlay = document.getElementById("sidebarOverlay");

  const panels = document.querySelectorAll(".mobile-panel");
  const mainPanel = document.querySelector(".main-panel");

  function openSidebar() {
    sidebar.classList.add("active");
    overlay.classList.add("active");
document.body.classList.add("sidebar-open");
    // pastikan selalu mulai dari panel utama
    panels.forEach(p => p.classList.remove("active"));
    mainPanel.classList.add("active");
  }

  function closeSidebar() {
    sidebar.classList.remove("active");
    overlay.classList.remove("active");
document.body.classList.remove("sidebar-open");
    // RESET SEMUA PANEL
    panels.forEach(p => p.classList.remove("active"));
    mainPanel.classList.add("active");
  }

  // buka sidebar
  hamburger.addEventListener("click", openSidebar);

  // tutup via overlay
  overlay.addEventListener("click", closeSidebar);

  // tutup saat klik menu link
sidebar.querySelectorAll("a").forEach(link => {
  link.addEventListener("click", function (e) {

    // JIKA BUKA SUB PANEL → JANGAN TUTUP SIDEBAR
    if (this.classList.contains("open-panel")) {
      e.preventDefault();
      return;
    }

    // JIKA LINK BIASA → TUTUP SIDEBAR
    closeSidebar();
  });
});


  // OPEN SUB PANEL
  document.querySelectorAll(".open-panel").forEach(btn => {
    btn.addEventListener("click", function () {
      const target = document.getElementById("panel-" + this.dataset.target);
      panels.forEach(p => p.classList.remove("active"));
      target.classList.add("active");
    });
  });

  // BACK BUTTON
  document.querySelectorAll(".back-btn").forEach(btn => {
    btn.addEventListener("click", function () {
      panels.forEach(p => p.classList.remove("active"));
      mainPanel.classList.add("active");
    });
  });
});
</script>

<script>
document.getElementById('openFilter').addEventListener('click', function () {
  const panel = document.getElementById('filterPanel');
  panel.style.display = panel.style.display === 'block' ? 'none' : 'block';
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
$(document).ready(function () {
  $('.trending-slider').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    smartSpeed: 800,
    nav: true,
    dots: false,
    items: 1,
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ]
  });
});
</script>
<script>
$(document).ready(function(){
  $('.hotnews-ads').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    nav: true,
    dots: false,
    navText: [
      '<span class="owl-prev">&lt;</span>',
      '<span class="owl-next">&gt;</span>'
    ]
  });
});
</script>


</body>

</html>