@extends('frontend.master')

@section('content')
<div class="d-flex" style="height: calc(100vh - 4.5rem);">
  <div class="card m-auto">
    <div class="card-body">
      <div class="d-flex">
        <h2 class="card-title text-info mr-5">Check Your Certificate</h5>
          <!-- <div class="search-icon my-auto ml-5" data-toggle="modal" data-target="#searchModal">
            <i class="icon_search"></i>
          </div> -->
          <form class="form-inline my-2 my-lg-0">
            @csrf
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
          </form>
      </div>
      <!-- Tempat memberikan info certificate tidak ditemukan -->
      <h4 class="card-text"><small class="text-muted">Certificate not found</small></p>
        <!-- End -->
    </div>
    <!-- Tempat pasang kondisi tampil certificate -->
    <img src="./img/core-img/instagram.svg" class="card-img-bottom w-100">
    <!-- Akhir tempatnya -->
  </div>
</div>
@endsection