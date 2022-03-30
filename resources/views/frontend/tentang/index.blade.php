@extends('frontend.master')

@section('content')
  @include('frontend.tools.carosuel')
  <div class="content d-flex mb-5">
    <h4 class="font-weight-normal m-auto text-center" style="width: 80%;">
      <b>Fajrul Islam</b> UKM Fajrul Islam Universitas Gunadarma merupakan suatu organisasi yang berbasis keislaman dan
      keberadaannya resmi di bawah wakil rektor III Universitas Gunadarma. Salah satu tujuan Fajrul Islam sebagai lembaga
      dakwah kampus tidak lain adalah membumikan nilai-nilai Islam di kampus Universitas Gunadarma tercinta.
      </h2>
  </div>
  <section class="uza-blog-area">
    <div class="blog-bg-curve">
      <img src="./img/core-img/curve-4.png" alt="">
    </div>

    <div class="container">
      <div class="row">
        <!-- Section Heading -->
        <div class="col-12">
          <div class="section-heading text-center">
            <h3>Visi Misi</h2>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Single Blog Post -->
        <div class="col-12 col-lg-6">
          <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/bg-img/10.jpg);">
            <!-- Post Content -->
            <div class="post-content">
              <span class="post-date"><span>08</span> July, 2022</span>
              <a href="#" class="post-title">Visi Misi</a>
              <ul>
                <li>Rizky Putra</li>
                <li>Novianto Nugroho</li>
                <li>Annisa Putri</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Single Blog Post -->
        <div class="col-12 col-lg-6">
          <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/bg-img/10.jpg);">
            <!-- Post Content -->
            <div class="post-content">
              <span class="post-date"><span>08</span> July, 2022</span>
              <a href="#" class="post-title">Visi Misi</a>
              <ul>
                <li>Rizky Putra</li>
                <li>Novianto Nugroho</li>
                <li>Annisa Putri</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="uza-about-us-area">
        <div class="container">
          <div class="row align-items-center">

            <!-- About Thumbnail -->
            <div class="col-12 col-md-6">
              <div class="about-us-thumbnail mb-80">
                <img src="{{ asset('assets/frontend/v1/imgfajrul/bg-img/bg-sejarah.png') }}" alt="">
              </div>
            </div>

            <!-- About Us Content -->
            <div class="col-12 col-md-6">
              <div class="about-us-content mb-80">
                <h2>Sejarah</h2>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                  incididunt ut
                  labore et
                  dolore magna aliqua. Urna id volutpat lacus laoreet non curabitur gravida arcu ac.
                  Purus
                  faucibus ornare
                  suspendisse sed nisi lacus sed viverra. Cursus in hac habitasse platea dictumst.
                  Tellus
                  molestie nunc
                  non
                  blandit massa enim nec dui nunc.</p>
                <a href="#" class="btn uza-btn btn-2 mt-4">Lihat selengkapnya</a>
              </div>
            </div>
          </div>
        </div>

        <!-- About Background Pattern -->
        <div class="about-bg-pattern">
          <img src="{{ asset('assets/frontend/v1/imgfajrul/core-img/curve-2.png') }}" alt="">
        </div>
      </div>

      <div class="uza-about-us-area">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <div class="about-us-content mb-80">
                <h2>Periode 2021/2022</h2>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                  incididunt ut
                  labore et
                  dolore magna aliqua. Urna id volutpat lacus laoreet non curabitur gravida arcu ac.
                  Purus
                  faucibus ornare
                  suspendisse sed nisi lacus sed viverra. Cursus in hac habitasse platea dictumst.
                  Tellus
                  molestie nunc
                  non
                  blandit massa enim nec dui nunc.</p>
                <a href="#" class="btn uza-btn btn-2 mt-4">Lihat selengkapnya</a>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="about-us-thumbnail mb-80">
                <img src="{{ asset('assets/frontend/v1/imgfajrul/bg-img/bg-periode.png') }}" alt="">
              </div>
            </div>
          </div>
        </div>

        <!-- About Background Pattern -->
        <div class="about-bg-pattern">
          <img src="{{ asset('assets/frontend/v1/imgfajrul/core-img/curve-2.png') }}" alt="">
        </div>
      </div>
    </div>
  </section>
@endsection
