@extends('layouts.app')

@section('title', 'Redaksi')

@section('content')

<style>
  .redaksi-wrapper {
    max-width: 760px;
    margin: auto;
  }

  .redaksi-title {
    font-weight: 800;
    letter-spacing: 1px;
    text-align: center;
  }

  .redaksi-subtitle {
    text-align: center;
    font-weight: 700;
    color: #198754; /* hijau */
    margin-bottom: 2px;
  }

  .redaksi-link {
    display: block;
    text-align: center;
    color: #0d6efd;
    font-weight: 600;
    text-decoration: none;
  }

  .redaksi-link:hover {
    text-decoration: underline;
  }

  /* Judul Jabatan */
  .redaksi-content h5 {
    margin-top: 24px;
    margin-bottom: 6px;
    font-weight: 700;
    color: #b02a37; /* merah maroon */
    text-transform: uppercase;
    font-size: 15px;
  }

  .redaksi-content ul {
    padding-left: 18px;
    margin-bottom: 8px;
  }

  .redaksi-content li,
  .redaksi-content p {
    margin-bottom: 4px;
    color: #212529;
    font-size: 15px;
  }

  .perhatian {
    font-size: 14.5px;
    line-height: 1.6;
    color: #444;
  }

  .perhatian strong {
    color: #000;
  }
</style>

<div class="container py-5">
  <div class="redaksi-wrapper">
    <div class="card shadow-sm">
      <div class="card-body">

        {{-- ===== JUDUL ===== --}}
        <h2 class="redaksi-title mb-1">REDAKSI</h2>
        <div class="redaksi-subtitle">STRUKTUR KARYAWAN</div>
        <a href="https://kabarmonitorindonesia.com" target="_blank" class="redaksi-link">
          kabarmonitorindonesia.com
        </a>

        <hr>

        {{-- ===== ISI ===== --}}
        <div class="redaksi-content">

          <h5>Pengelola</h5>
          <ul>
            <li>PT. Zivana Anugrah Mandiri ( SK Menkum dan HAM RI No. AHU-054605.AH.01.30. Tahun 2023)</li>
          </ul>

          <h5>Dewan Pembina</h5>
          <ul>
            <li>Agung Joyo Baskoro</li>
          </ul>

          <h5>Penasehat Hukum</h5>
          <ul>
            <li>Fayol Simamora, SH</li>
            <li>H. Jakfar Tamba</li>
          </ul>

          <h5>Direktur Perusahaan/Pimpinan Redaksi</h5>
          <p>HARDEDI</p>

          <h5>Administrasi dan Keuangan</h5>
          <ul>
            <li>Bambang Harianto</li>
          </ul>

          <h5>Network Management dan Marketing</h5>
          <p>Indah Kartika</p>

          <h5>Koordinator Liputan</h5>
          <ul>
            <li>Eka El Rini, S.E</li>
          </ul>

          <h5>Editor</h5>
          <ul>
            <li>Bobby Setiawan</li>
          </ul>

          <h5>Wartawan</h5>
          <ul>
            <li>Yousep (Reporter Daerah)</li>
            <li>Nahar (Rokan Hilir)</li>
            <li>Wawan (Rokan Hulu)</li>
            <li>Ferdyansyah (Siak)</li>
            <li>M. Riduwan (Bengkalis)</li>
            <li>Rahmad (Dumai)</li>
            <li>Hakim  (Kepulauan Meranti)</li>
            <li>Raga Sasra (Kuansing)</li>
            <li>David Amriadi  (Pelalawan)</li>
            <li>Gatot Herdiwijaya  (Indragiri Hilir)</li>
            <li>Agusman (Indragiri Hulu)</li>
            <li>Daniel Phillip  (Kampar )</li>
            <li>Dll</li>
          </ul>

          <h5>Management Iklan</h5>
          <p>Eka El Rini, SE</p>

          <hr>

          <h5>Kantor Redaksi</h5>
          <p>
            Jl. Rawa Bening No. 11 Tangkerang Labuai<br>
            Pekanbaru – Riau
          </p>

          <h5>Rekening Bank</h5>
          <p>
            <strong>Bank Riau Kepri</strong><br>
            No. Rek: 107-43-92400<br>
            A/n Hardedi
          </p>

          <p>
            <strong>Bank BCA KCU Pekanbaru</strong><br>
            No. Rek: 0343628070<br>
            A/n Hardedi
          </p>

        </div>

        <hr>

        {{-- ===== PERHATIAN ===== --}}
        <div class="perhatian">
          <p><strong>PERHATIAN!</strong></p>
          <p>
            Redaksi Kabarmonitorindonesia.com tidak melarang pengelola media massa
            mengutip berita teks maupun foto dengan mencantumkan sumber berita.
          </p>
          <p>
            Redaksi menerima informasi dari masyarakat dengan menunjukkan identitas diri (KTP).
          </p>
          <p>
            Wartawan Kabarmonitorindonesia.com hanyalah yang tercantum dalam Box Redaksi.
            Jika terdapat kejanggalan, hubungi <strong>0812-766-4665</strong>.
          </p>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection