@extends('frontend.master')

@section('content')
  @include('frontend.tools.carosuel')
  <section class="uza-blog-area">
    <div class="blog-bg-curve">
      <img src="./img/core-img/curve-4.png" alt="">
    </div>

    <div class="container">
      <div class="row">
        <!-- Section Heading -->
        <div class="col-12">
          <div class="section-heading text-center">
            <h3>Layanan</h2>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Single Blog Post -->
        <a href="{{ route('donasi.index') }}">
          <div class="col-12 col-lg-6">
            <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/bg-img/10.jpg);">
              <!-- Post Content -->
              <div class="post-content">
                {{-- <span class="post-date"><span>08</span> July, 2022</span> --}}
                <a href="{{ route('donasi.index') }}" class="post-title">Faris Fundaraise</a>
                <p>Faris Fundaraise adalah sebuah platform yang memungkinkan para donatur untuk berdonasi kepada
                  lembaga-lembaga sosial yang terdaftar di Indonesia. Donasi yang diberikan akan disalurkan langsung
                  kepada lembaga-lembaga sosial yang terdaftar di Indonesia.
                </p>
                <p>
                    <a href="{{ route('donasi.index') }}">
                        <h4>Klik Disini</h4>
                    </a>
                </p>
              </div>
            </div>
          </div>
        </a>

        <!-- Single Blog Post -->
        <div class="col-12 col-lg-6">
          <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/bg-img/10.jpg);">
            <!-- Post Content -->
            <div class="post-content">
              {{-- <span class="post-date"><span>08git add .</span> July, 2022</span> --}}
              <a href="#" class="post-title">Faris Shop</a>
              <p>Comming Soon</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-lg-6">
          <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/bg-img/10.jpg);">
            <!-- Post Content -->
            <div class="post-content">
              {{-- <span class="post-date"><span>08git add .</span> July, 2022</span> --}}
              <a href="#" class="post-title">Faris Menjawab</a>
              <p>Comming Soon</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-lg-6">
          <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/bg-img/10.jpg);">
            <!-- Post Content -->
            <div class="post-content">
              {{-- <span class="post-date"><span>08git add .</span> July, 2022</span> --}}
              <a href="#" class="post-title">Faris Psikologi</a>
              <p>Comming Soon</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
