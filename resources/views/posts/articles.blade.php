<div class="recent-articles">
  <div class="container">

    {{-- TITLE --}}
    <div class="row mb-4">
      <div class="col-12">
        <div class="section-tittle">
          <h3>Partner</h3>
        </div>
      </div>
    </div>

    {{-- SLIDER --}}
    <div class="row">
      <div class="col-12">

        {{-- ⚠️ class ini HARUS sama dengan JS --}}
        <div class="recent-active">

          @forelse($ads as $ad)
            <div class="single-recent-item">

              {{-- IMAGE --}}
              <div class="recent-thumb">
                <a href="{{ $ad->url ?? '#' }}" target="_blank">
                  <img
                    src="{{ asset('uploads/ads/'.$ad->image) }}"
                    alt="{{ $ad->title }}">
                </a>
              </div>

              {{-- TEXT / KETERANGAN (TIDAK DIHILANGKAN) --}}
              <div class="recent-caption">
                <span class="recent-title">
                  {{ $ad->title }}
                </span>
              </div>

            </div>
          @empty
            <p class="text-center">No active ads at the moment.</p>
          @endforelse

        </div>

      </div>
    </div>

  </div>
</div>
