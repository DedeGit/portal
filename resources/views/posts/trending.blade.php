<div class="trending-area fix">
  <div class="container">
    <div class="trending-main">
{{-- ================= POPULER TITLE + RUNNING TEXT ================= --}}
<div class="row">
  <div class="col-lg-12">
    <div class="trending-tittle">
      <strong>
        <a href="{{ route('berita.populer') }}">POPULER</a>
      </strong>
      <div class="trending-animated">
        <ul id="js-news" class="js-hidden">
          @foreach ($trendingPosts as $post)
            <li class="news-item">{{ $post->post_title }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>

{{-- ================= POPULER SLIDER ================= --}}
<div class="row">
  <div class="col-lg-12 mx-auto">

    @if($trendingPosts->count())
      <div class="trending-slider owl-carousel">

        @foreach ($trendingPosts as $post)
          <div class="single-slide">
            <div class="trend-top-img">
              <img src="{{ asset('uploads/posts/'.$post->post_image) }}" alt="{{ $post->post_title }}">

              <div class="trend-top-cap">
                <span>{{ $post->main_categories }}</span>

                <h2>
                  <a href="{{ route('post.show', $post->post_url) }}">
                    {{ $post->post_title }}
                  </a>
                </h2>

                @if($post->post_description)
                  <p class="mb-2">{{ $post->post_description }}</p>
                @endif

                <p>
                  by <a style="color:#d0312d; text-decoration:none;">kabarmonitor</a>
                  -
                  <i class="fa fa-calendar"></i>
                  {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y') }}
                </p>
              </div>

            </div>
          </div>
        @endforeach

      </div>
    @endif
  </div>
</div>


<div class="col-lg-12 col-md-12 mx-auto">

  <div class="section-tittle mb-30"  style="margin-top:50px; padding-top:20px; border-top:1px solid #333030ff;">
    <h3><a href="{{ route('berita.hot') }}">Hot News</a></h3>
  </div>
<div class="hotnews-ads owl-carousel mb-20">
  @foreach($todayAds as $ad)
    <div class="hotnews-ad-item">
      <img src="{{ asset('uploads/ads/'.$ad->image) }}" alt="iklan">
    </div>
  @endforeach
</div>
  @foreach ($hotNewsPosts as $post)
    <div class="trand-right-single d-flex align-items-start mb-20">

      <div class="trand-right-img">
        <a href="{{ route('post.show', $post->post_url) }}">
          <img 
            src="{{ asset('uploads/posts/'.$post->post_image) }}" 
            alt="{{ $post->post_title }}"
            loading="lazy"
          >
        </a>
      </div>

      <div class="trand-right-cap">
        <a 
  href="{{ url('/kategori/'.Str::slug($post->main_categories)) }}"
  class="hotnews-category"
>
  {{ strtoupper($post->main_categories) }}
</a>

        <h4>
          <a href="{{ route('post.show', $post->post_url) }}">
            {{ Str::limit($post->post_title, 60) }}
          </a>
        </h4>

        <p>
          by <a style="color:#d0312d; text-decoration:none;">kabarmonitor</a> -
          <i class="fa fa-calendar"></i>
          {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y') }}
        </p>
      </div>

    </div>
  @endforeach
</div>

