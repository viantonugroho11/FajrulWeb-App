@extends('frontend.master')

@section('content')
<div class="d-flex" style="height: calc(100vh - 4.5rem);">
  <div class="card m-auto">
    <div class="card-body">
      <div class="d-flex">
        <h2 class="card-title text-info mr-5">Check Your Certificate</h5>
          <form class="form-inline my-2 my-lg-0" method="POST" action="{{route('landing.sertifikat.cari')}}">
            @csrf
            <input name="id" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection