@extends('layouts.admin')
<script>
document.addEventListener("DOMContentLoaded", function () {

    const ctx = document.getElementById('postChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [
                {
                    label: 'Post',
                    data: {!! json_encode($postData) !!},
                    borderWidth: 2,
                    tension: 0.4
                },
                {
                    label: 'Iklan',
                    data: {!! json_encode($adsData) !!},
                    borderWidth: 2,
                    tension: 0.4
                },
                {
                    label: 'Pengunjung',
                    data: {!! json_encode($visitorData) !!},
                    borderWidth: 2,
                    tension: 0.4
                },
                {
                    label: 'View',
                    data: {!! json_encode($viewData) !!},
                    borderWidth: 2,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

});
</script>

@section('title', 'Dashboard')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<div class="row">

  {{-- ================= KALENDER ================= --}}
  <div class="col-lg-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-3">Kalender</h5>

        <form method="GET" action="{{ url('/admin/dashboard') }}">
          <input
            type="text"
            id="calendar"
            name="date"
            class="form-control"
            value="{{ $date ?? '' }}"
            placeholder="Pilih tanggal..."
            autocomplete="off"
          >
        </form>

        <small class="text-muted d-block mt-2">
          Filter data dashboard berdasarkan tanggal
        </small>
        @if($date)
  <div class="mt-3">
    <a href="{{ url('/admin/dashboard') }}"
       class="btn btn-sm btn-outline-secondary">
      Reset Tanggal
    </a>
  </div>
@endif
      </div>
    </div>
  </div>

  {{-- ================= INFO ================= --}}

  <div class="col-lg-7">
  <div class="card">
    <div class="card-body text-center">

      <h5 class="card-title mb-4">For Your Information</h5>

      <div class="row mb-4">
        <div class="col-3">
          <span>Post Hari Ini</span>
          <h4>{{ $todayPosts }}</h4>
        </div>
        <div class="col-3">
          <span>Total Post</span>
          <h4>{{ $totalPosts }}</h4>
        </div>
        <div class="col-3">
          <span>Iklan Hari Ini</span>
          <h4>{{ $todayAds }}</h4>
        </div>
        <div class="col-3">
          <span>Total Iklan</span>
          <h4>{{ $totalAds }}</h4>
        </div>
      </div>

        <hr>
<p>Pengunjung Hari Ini: {{ $todayVisitors }}</p>
        <p>Total Pengunjung: <strong>{{ $totalVisitors }}</strong></p>
                <p>Total View Hari ini: <strong>{{ $todayView }}</strong></p>
        <p>Total View : <strong>{{ $totalView }}</strong></p>

      </div>
    </div>
  </div>

</div>
<div class="col-lg-12 mt-4">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title text-center">
        Grafik Post 30 Hari Terakhir
      </h5>

      <canvas id="postChart" height="100"></canvas>
    </div>
  </div>
</div>

{{-- ================= SCRIPT ================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
  flatpickr("#calendar", {
    dateFormat: "Y-m-d",
    defaultDate: "{{ $date ?? '' }}",
 onChange: function(selectedDates, dateStr) {      
      window.location.href = `/admin/dashboard?date=${dateStr}`;

    }
  });
});
</script>

@endsection
