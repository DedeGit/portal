<div class="container-fluid px-3 px-md-5">

  <div class="section-tittle"
       style="margin-top:40px; padding-top:20px; border-top:1px solid #ddd;">
    <h3>
      <a href="{{ route('berita.semua') }}">Berita Selengkapnya</a>
    </h3>
  </div>
  {{-- IKLAN (SAMA SEPERTI HOT NEWS) --}}
  @if(isset($todayAds) && $todayAds->count())
    <div class="hotnews-ads owl-carousel mb-40">
      @foreach($todayAds as $ad)
        <div class="hotnews-ad-item">
          <img
            src="{{ asset('uploads/ads/'.$ad->image) }}"
            alt="iklan"
            style="width:100%; height:180px; object-fit:cover; border-radius:6px;"
          >
        </div>
      @endforeach
    </div>
  @endif

  @foreach($posts as $post)
    <div class="trand-right-single d-flex align-items-start mb-25">

      {{-- IMAGE --}}
      <div class="trand-right-img" style="width:160px; flex-shrink:0;">
        <a href="{{ route('post.show', $post->post_url) }}">
          <img
            src="{{ asset('uploads/posts/'.$post->post_image) }}"
            alt="{{ $post->post_title }}"
            style="width:100%; height:110px; object-fit:cover; border-radius:6px;"
          >
        </a>
      </div>

      {{-- CONTENT --}}
      <div class="trand-right-cap pl-20">

        <a href="{{ url('/kategori/'.Str::slug($post->main_categories)) }}"
           class="hotnews-category">
          {{ strtoupper($post->main_categories) }}
        </a>

        <h4 style="margin-top:8px;">
          <a href="{{ route('post.show', $post->post_url) }}">
            {{ Str::limit($post->post_title, 80) }}
          </a>
        </h4>

        <p style="font-size:13px; color:#777;">
          by <span style="color:#d0312d;">kabarmonitor</span> ·
          {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y') }}
        </p>

      </div>

    </div>
  @endforeach

</div>
