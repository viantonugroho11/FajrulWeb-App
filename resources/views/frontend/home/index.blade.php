@extends('frontend.master')

@section('content')
@include('frontend.tools.carosuel')
  <!-- ***** About Us Area Start ***** -->
  <section class="uza-about-us-area">
    <div class="container">
      <div class="row align-items-center">

        <!-- About Thumbnail -->
        <div class="col-12 col-md-6">
          <div class="about-us-thumbnail mb-80">
            <img src="./img/bg-img/2.jpg" alt="">
            <!-- Video Area -->
            <div class="uza-video-area hi-icon-effect-8">
              <a href="https://www.youtube.com/watch?v=sSakBz_eYzQ" class="hi-icon video-play-btn"><i class="fa fa-play"
                  aria-hidden="true"></i></a>
            </div>
          </div>
        </div>

        <!-- About Us Content -->
        <div class="col-12 col-md-6">
          <div class="about-us-content mb-80">
            <h2>We're a Agency Team &amp; Digital Marketing</h2>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing esed diam nonumy eirmod tempor invidunt ut
              labore et dolore magna.</p>
            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata
              sanctus est Lorem ipsum dolor sit amet ipsumlor eut consetetur sadipscing elitr, sed diam
              nonumy eirmod tempor invidunt labore et dolore magna
              liquyam erat.</p>
            <a href="#" class="btn uza-btn btn-2 mt-4">Start Exploring</a>
          </div>
        </div>
      </div>
    </div>

    <!-- About Background Pattern -->
    <div class="about-bg-pattern">
      <img src="./img/core-img/curve-2.png" alt="">
    </div>
  </section>
  <!-- ***** About Us Area End ***** -->

  <!-- ***** About Us Area Start ***** -->
  <section class="uza-about-us-area">
    <div class="container">
      <div class="row align-items-center">

        <!-- About Us Content -->
        <div class="col-12 col-md-6">
          <div class="about-us-content mb-80">
            <h2>We're a Agency Team &amp; Digital Marketing</h2>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing esed diam nonumy eirmod tempor invidunt ut
              labore et dolore magna.</p>
            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata
              sanctus est Lorem ipsum dolor sit amet ipsumlor eut consetetur sadipscing elitr, sed diam
              nonumy eirmod tempor invidunt labore et dolore magna
              liquyam erat.</p>
            <a href="#" class="btn uza-btn btn-2 mt-4">Start Exploring</a>
          </div>
        </div>
        <!-- About Thumbnail -->
        <div class="col-12 col-md-6">
          <div class="about-us-thumbnail mb-80">
            <img src="./img/bg-img/2.jpg" alt="">
            <!-- Video Area -->
            <div class="uza-video-area hi-icon-effect-8">
              <a href="https://www.youtube.com/watch?v=sSakBz_eYzQ" class="hi-icon video-play-btn"><i
                  class="fa fa-play" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About Background Pattern -->
    <div class="about-bg-pattern">
      <img src="./img/core-img/curve-2.png" alt="">
    </div>
  </section>
  <!-- ***** About Us Area End ***** -->

  @include('frontend.tools.blogLatest')
  @include('frontend.tools.eventLatest')
@endsection
