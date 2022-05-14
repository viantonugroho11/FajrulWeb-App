@extends('frontend.master')

@section('content')
  <div class="uza-blog-area section-padding-80">
    <div class="d-flex" style="height: calc(100vh - 4.5rem);">
      <div class="card m-auto">
        <div class="card-body">
          <div class="d-flex">
            @if ($sertif == null)
              <h5 class="card-title text-info mr-5">Sertifikat Tidak ada/Serial Sertifikat Salah</h5>
            @else
              <div class="col-6">
                <p>
                <h6 class="card-title text-info mr-5">Nama</h6>
                <h6 class="card-title text-info mr-5">{{ $sertif->nama }}</h6>
                </p>
                <p>
                <h6 class="card-title text-info mr-5">Email</h6>
                <h6 class="card-title text-info mr-5">{{ $sertif->email }}</h6>
                </p>
              </div>
              <div class="col-6">
                <p>
                <h6 class="card-title text-info mr-5">Event</h6>
                <h6 class="card-title text-info mr-5">{{ $sertif->acara()->nama }}</h6>
                </p>
                <p>
                <h6 class="card-title text-info mr-5">Serial</h6>
                <h6 class="card-title text-info mr-5">{{ $sertif->no_sertifikat }}</h6>
                </p>
              </div>
            @endif
          </div>
          <!-- <h4 class="card-text"><small class="text-muted">Certificate not found</small></p> -->
        </div>
        <!-- Tempat pasang kondisi tampil certificate -->
        {{-- <img src="{{asset('assets/frontend/v1/imgfajrul/core-img/instagram.svg')}}" class="card-img-bottom w-100"> --}}
        <!-- Akhir tempatnya -->
      </div>
    </div>
    @if($sertif != null)
    <div class="d-flex">
      <div class="card m-auto">
        <div class="card-body">

          <img src="{{ $sertif->getFile() }}" class="card-img-bottom w-100">
        </div>
        <!-- Tempat pasang kondisi tampil certificate -->
        <!-- Akhir tempatnya -->
      </div>
    </div>
    @endif
  </div>
@endsection
