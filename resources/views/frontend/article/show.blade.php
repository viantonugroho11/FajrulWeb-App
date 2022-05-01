@extends('frontend.master')

@section('content')
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcrumb-area">
  <div class="container h-100">
    <div class="row h-100 align-items-end">
      <div class="col-12">
        <div class="breadcumb--con">
          <h2 class="title">{{$artikels->nama_artikel}}</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Blog</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$artikels->slug}}</li>
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
                  <a href="#" class="post-date">{{$artikels->created_at}}</a>
                  <h2>{{$artikels->nama_artikel}}</h2>
                  <h6><span><i class="icon-eye"></i>Artikel ini dibaca sebanyak <b>{{$artikels->viewer->count()}}</b> Kali</span></h6>
                </div>
              </div>
              <div class="col-12">
                <img class="mb-50" src="img/bg-img/14.jpg" alt="">
              </div>
              <div class="col-12 col-lg-10">
                {!!$artikels->isi_artikel!!}
                <!-- Post Catagories & Post Share -->
                <div class="d-flex align-items-center justify-content-between">
                  <!-- Post Catagories -->
                  {{-- <div class="post-catagories">
                      <ul class="d-flex flex-wrap align-items-center">
                        <li><a href="#">Tutorials</a></li>
                        <li><a href="#">Business</a></li>
                      </ul>
                    </div> --}}

                  <!-- Post Share -->
                  <div class="uza-post-share d-flex align-items-center">
                    <h6 class="mb-0 mr-3">Share:</h6>
                    <div class="social-info-">
                      <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                      <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                      <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                      <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                      <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
                <!-- Related News Area -->
                <div class="related-news-area">
                  @include('frontend.tools.blogLatest')
                </div>

                <!-- Comments Area -->
                {{-- <div class="comment_area mb-50 clearfix">
                    <h5 class="title">03 Comments</h5>

                    <ol>
                      <!-- Single Comment Area -->
                      <li class="single_comment_area">
                        <!-- Comment Content -->
                        <div class="comment-content d-flex">
                          <!-- Comment Author -->
                          <div class="comment-author">
                            <img src="img/bg-img/15.jpg" alt="author">
                          </div>
                          <!-- Comment Meta -->
                          <div class="comment-meta">
                            <a href="#" class="post-date">27 Aug 2018</a>
                            <h5>Jerome Leonard</h5>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit,
                              sed quia non numquam eius modi</p>
                            <a href="#" class="like">Like</a>
                            <a href="#" class="reply">Reply</a>
                          </div>
                        </div>

                        <ol class="children">
                          <li class="single_comment_area">
                            <!-- Comment Content -->
                            <div class="comment-content d-flex">
                              <!-- Comment Author -->
                              <div class="comment-author">
                                <img src="img/bg-img/16.jpg" alt="author">
                              </div>
                              <!-- Comment Meta -->
                              <div class="comment-meta">
                                <a href="#" class="post-date">27 Aug 2018</a>
                                <h5>Theodore Adkins</h5>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci
                                  velit, sed quia non numquam eius modi</p>
                                <a href="#" class="like">Like</a>
                                <a href="#" class="reply">Reply</a>
                              </div>
                            </div>
                          </li>
                        </ol>
                      </li>

                      <!-- Single Comment Area -->
                      <li class="single_comment_area">
                        <!-- Comment Content -->
                        <div class="comment-content d-flex">
                          <!-- Comment Author -->
                          <div class="comment-author">
                            <img src="img/bg-img/17.jpg" alt="author">
                          </div>
                          <!-- Comment Meta -->
                          <div class="comment-meta">
                            <a href="#" class="post-date">27 Aug 2018</a>
                            <h5>Roger Marshall</h5>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit,
                              sed quia non numquam eius modi</p>
                            <a href="#" class="like">Like</a>
                            <a href="#" class="reply">Reply</a>
                          </div>
                        </div>
                      </li>
                    </ol>
                  </div>
                  <!-- Leave A Reply -->
                  <div class="uza-contact-form">
                    <h2 class="mb-4">Leave A Comment</h2>

                    <!-- Form -->
                    <form action="#" method="post">
                      <div class="row">
                        <div class="col-lg-6">
                          <input type="text" name="message-name" class="form-control mb-30" placeholder="Name">
                        </div>
                        <div class="col-lg-6">
                          <input type="email" name="message-email" class="form-control mb-30" placeholder="Email">
                        </div>
                        <div class="col-12">
                          <textarea name="message" class="form-control mb-30" placeholder="Comment"></textarea>
                        </div>
                        <div class="col-12">
                          <button type="submit" class="btn uza-btn btn-3 mt-15">Post Comment</button>
                        </div>
                      </div>
                    </form>
                  </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Blog Details Area End ***** -->
@include('frontend.tools.newsletter')
@endsection