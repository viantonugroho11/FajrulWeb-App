@extends('frontend.master')

@section('content')
@include('frontend.tools.carosuel')
<!-- ***** About Us Area Start ***** -->
<div class="uza-about-us-area">
  <div class="container">
    <div class="row align-items-center">

      <!-- About Thumbnail -->
      <div class="col-12 col-md-6">
        <div class="about-us-thumbnail mb-80">
          <img src="{{ asset('assets/frontend/v1/imgfajrul/bg-img/img-aboutme.png') }}" alt="">
        </div>
      </div>

      <!-- About Us Content -->
      <div class="col-12 col-md-6">
        <div class="about-us-content mb-80">
          <h2>Tentang Kami</h2>
          <p> UKM Fajrul Islam Universitas Gunadarma merupakan suatu organisasi yang berbasis keislaman dan
            keberadaannya resmi di bawah wakil rektor III Universitas Gunadarma. Salah satu tujuan Fajrul Islam sebagai
            lembaga dakwah kampus tidak lain adalah membumikan nilai-nilai Islam di kampus Universitas Gunadarma
            tercinta.</p>
          <a href="{{route('tentang.detail')}}" class="btn uza-btn btn-2 mt-4">Lihat selengkapnya</a>
        </div>
      </div>
    </div>
  </div>

  <!-- About Background Pattern -->
  <div class="about-bg-pattern">
    <img src="{{ asset('assets/frontend/v1/imgfajrul/img/core-img/curve-2.png') }}" alt="">
  </div>

</div>

<!-- program Kerja -->
<div class="row d-flex proker">
  <div class="col m-auto text-center">
    <h3 class="tag-proker no-gutters">10+ Program Kerja <br> Terealisasikan</h3>
    <a href="#" class="btn uza-btn btn-2 mt-4">Lihat selengkapnya</a>
  </div>
  <div class="col m-auto">
    <img src="{{ asset('assets/frontend/v1/imgfajrul/bg-img/program-kerja.png') }}" width="489px" height="475px">
  </div>
</div>
<!-- End -->

@include('frontend.tools.blogLatest')
@include('frontend.tools.eventLatest')
@include('frontend.tools.newsletter')
@endsection