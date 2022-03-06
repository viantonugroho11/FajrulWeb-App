<section class="uza-blog-area">
  <!-- Background Curve -->
  <div class="blog-bg-curve">
    <img src="./img/core-img/curve-4.png" alt="">
  </div>

  <!-- CTA Area Start -->
  {{-- <div class="uza-cta-area section-padding-0-80">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-lg-8">
          <div class="cta-content mb-80">
            <h2>Interested in working with us?</h2>
            <h6>Hit the button below or give us a call!</h6>
          </div>
        </div>

        <div class="col-12 col-lg-4">
          <div class="cta-content mb-80">
            <div class="call-now-btn">
              <a href="#"><span>Call us now:</span> (+65) 1234 5678</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- CTA Area End -->

  <div class="container">
    <div class="row">
      <!-- Section Heading -->
      <div class="col-12">
        <div class="section-heading text-center">
          <h2>Artikel Terbaru</h2>
          {{-- <p>Hit the button below or give us a call!</p> --}}
        </div>
      </div>
    </div>

    <div class="row">

      <!-- Single Blog Post -->
      @foreach ($artikel as $item)


      <div class="col-12 col-lg-4">
        <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/bg-img/8.jpg);">
          <!-- Post Content -->
          <div class="post-content">
            <span class="post-date">{{$item->created_at}}</span>
            <a href="{{route('landing.blog.show',$item->slug)}}" class="post-title">{{$item->nama_artikel}}</a>
            <p>{{Str::limit($item->isi_singkat, 250, '...')}}</p>
            <a href="{{route('landing.blog.show',$item->slug)}}" class="read-more-btn">Read More <i class="arrow_carrot-2right"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
