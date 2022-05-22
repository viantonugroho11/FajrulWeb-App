@extends('frontend.master')

@section('content')
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcrumb-area">
  <div class="container h-100">
    <div class="row h-100 align-items-end">
      <div class="col-12">
        <div class="breadcumb--con">
          <h2 class="title">{{$event->nama}}</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Event</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$event->nama}}</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- Background Curve -->
  <div class="breadcrumb-bg-curve">
    <img src="./img/core-img/curve-5.png" alt="">
  </div>
</div>
<!-- ***** Breadcrumb Area End ***** -->

<!-- ***** Blog Details Area Start ***** -->
<section class="blog-details-area section-padding-80">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="blog-details-content">
          <!-- Post Details Text -->
          <div class="post-details-text">

            <div class="row justify-content-center">
              <div class="col-12 col-lg-10">
                <div class="post-content text-center mb-50">
                  <a href="#" class="post-date">{{$event->created_at}}</a>
                  <h2>{{$event->nama}}</h2>
                </div>
              </div>
              <div class="col-12">
                <img class="mb-50" src="img/bg-img/14.jpg" alt="">
              </div>
              <div class="col-12 col-lg-10">
                {!! $event->deskripsi !!}

                <!-- Related News Area -->
                <div class="related-news-area">
                  @include('frontend.tools.blogLatest')
                </div>

                <button type="submit" class="btn uza-btn btn-3 mt-15">Post Comment</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Blog Details Area End ***** -->
@endsection