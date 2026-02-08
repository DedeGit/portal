<header>
  <!-- Header Start -->
  <div class="header-area">
    <div class="main-header ">

      <div class="header-top red-bg">
        <div class="container">
          <div class="col-xl-12">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="header-info-left">
                <ul>
                  <li>
                    <img src="{{ asset('assets/img/icon/header_icon1.png') }}"
                         alt="{{ \Carbon\Carbon::now()->format('l, jS F, Y') }}">
                    {{ \Carbon\Carbon::now()->format('l, jS F, Y') }}
                  </li>
                </ul>
              </div>

              <div class="header-info-right">
                <ul class="header-social">
                  <li><a href="https://youtube.com/@kabarmonitorindonesia?si=_Mk94ugEVdYkhbYC" target="_blank"><i class="fab fa-youtube"></i></a></li>
                  <li><a href="https://www.tiktok.com/@kabarmonitor.ind.com?_r=1&_t=ZS-92i8GWiZMCi" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                  <li><a href="https://www.instagram.com/kabarmonitor_indonesia?igsh=YXE1dzU0ZzJ4NTc3" target="_blank"><i class="fab fa-instagram"></i></a></li>
                  <li><a href="https://www.facebook.com/share/1DNH3nbtr5/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="/admin/auth/login"><i class="fas fa-user"></i></a></li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="header-mid">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
              <div class="header-banner">
                @if ($headerAds && $headerAds->image)
                  <img src="{{ asset('uploads/ads/' . $headerAds->image) }}" alt="{{ $headerAds->title }}">
                @else
                  <img src="{{ asset('assets/img/hero/header_image.jpg') }}" alt="Default Header Image">
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- ================= HEADER BOTTOM ================= -->
      <div class="header-bottom header-sticky">
        <div class="container">
          <div class="row align-items-center">
 <!-- MOBILE HEADER BAR -->
      <div class="col-12 mobile-header d-md-none">

        <!-- LOGO (MUNCUL SAAT SCROLL) -->
        <div class="mobile-logo-sticky">
          <a href="/">
            <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo">
          </a>
        </div>

        <!-- SEARCH -->
        <div class="mobile-search">
          <a href="#" class="openSearch">
            <i class="fas fa-search"></i>
          </a>
        </div>

<!-- FILTER ICON -->
<div class="filter-box">
  <button type="button" id="openFilter">
    <i class="fas fa-sliders-h"></i>
  </button>
</div>

<div id="filterPanel" class="filter-panel">
  <form method="GET" action="{{ route('filter.result') }}">

    <!-- FILTER TANGGAL -->
    <label>Tanggal:</label>
    <input type="date" name="filter_date">

    <!-- FILTER URUTAN -->
    <label>Urutkan:</label>
    <select name="sort">
      <option value="newest">Terbaru</option>
      <option value="oldest">Terlama</option>
    </select>

    <button type="submit">Terapkan</button>
  </form>
</div>


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



              <div class="main-menu d-none d-md-block">
                <nav>
                  <ul id="navigation">

                    <li class="menu-logo">
                      <a href="/">
                        <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Kabar Monitor">
                      </a>
                    </li>

                    <li class="menu-home">
                      <a href="/"><i class="fas fa-home"></i></a>
                    </li>

                    <li><a href="#">Seputar Riau</a>
                      <ul class="submenu">
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
                    </li>

      <li><a href="/kategori/Hukum-dan-Kriminal">Hukrim</a></li>
      <li><a href="/kategori/Potret-Peristiwa">Potret Peristiwa</a></li>
      <li><a href="/kategori/Politik">Politik</a></li>
      <li><a href="/kategori/Pemerintah">Pemerintah</a></li>

                    <li><a href="#">Kategori</a>
                      <ul class="submenu">
                        <li><a href="/status/populer">Populer</a></li>
                        <li><a href="/status/hot-news">Hot News</a></li>
                      </ul>
                    </li>

                    <li><a href="#">More</a>
                      <ul class="submenu">
                        <li><a href="/more/Nasional">Nasional</a></li>
                        <li><a href="/more/Agama">Agama</a></li>
                        <li><a href="/more/Olahraga">Olahraga</a></li>
                        <li><a href="/more/Ekonomi">Ekonomi</a></li>
                        <li><a href="/more/Pariwisata">Pariwisata</a></li>
                        <li><a href="/more/Teknologi">Teknologi</a></li>
                        <li><a href="/more/Kesehatan">Kesehatan</a></li>
                        <li><a href="/more/Life-Style">Life Style</a></li>
                      </ul>
                    </li>
                 
<!-- SEARCH ICON -->
<li class="menu-search">
  <a href="#" class="openSearch" title="Cari Berita">
    <i class="fas fa-search"></i>
  </a>
</li>

      
                  </ul>

                </nav>
              </div>
            </div>



            <!-- <div class="col-12">
              <div class="mobile_menu d-block d-md-none"></div>
            </div> -->
</div>
          </div>
        </div>
      </div>
                </div>
        </div>
      </div>

      <!-- ================= END HEADER BOTTOM ================= -->

    </div>
  </div>
  <!-- Header End -->
</header>
