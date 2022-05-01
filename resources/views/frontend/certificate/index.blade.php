@extends('frontend.master')

@section('content')
<div class="d-flex mt-5">
  <div class="card m-auto">
    <div class="card-body">
      <div class="d-flex">
        <h2 class="card-title text-info mr-5">Check Your Certificate</h5>
          <div class="search-icon my-auto ml-5" data-toggle="modal" data-target="#searchModal">
            <i class="icon_search"></i>
          </div>
      </div>
      <!-- Tempat memberikan info certificate tidak ditemukan -->
      <h4 class="card-text"><small class="text-muted">Certificate not found</small></p>
        <!-- End -->
    </div>
    <!-- Tempat pasang kondisi tampil certificate -->
    <img src="./img/core-img/instagram.svg" class="card-img-bottom">
    <!-- Akhir tempatnya -->
  </div>
</div>
@endsection