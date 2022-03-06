<section class="uza-blog-area">
  <!-- Background Curve -->
  <div class="blog-bg-curve">
    <img src="./img/core-img/curve-4.png" alt="">
  </div>

  <div class="container">
    <div class="row">
      <!-- Section Heading -->
      <div class="col-12">
        <div class="section-heading text-center">
          <h2>Event Terbaru</h2>
          {{-- <p></p> --}}
        </div>
      </div>
    </div>

    <div class="row">
      @foreach ($acara ?? '' as $item)
        <!-- Single Blog Post -->
        <div class="col-12 col-lg-4">
          <div class="single-blog-post bg-img mb-80" style="background-image: url();">
            <!-- Post Content -->
            <div class="post-content">
              <span class="post-date">{{$item->created_at}}</span>
              <a href="#" class="post-title">{{$item->nama}}</a>
              <p>{{Str::limit($item->deskripsi_singkat,250,'...')}}</p>
              <a href="#" class="read-more-btn">Read More <i class="arrow_carrot-2right"></i></a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
