@extends('donasi.master')
@section('content')
  <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
      <div class="row g-5">
        <div class="col-lg-8">
          <!-- Blog Detail Start -->
          <div class="mb-5">
            <img class="img-fluid w-100 rounded mb-5" src="img/blog-1.jpg" alt="">
            <h1 class="mb-4">{{ $kampanye->title }}</h1>
            <p>
              {!! $kampanye->description !!}
            </p>
          </div>
          <!-- Blog Detail End -->

          <!-- Comment List Start -->
          <div class="mb-5">
            <div class="section-title section-title-sm position-relative pb-3 mb-4">
              <h3 class="mb-0">Kabar Berita Donasi</h3>
            </div>
            @foreach ($kabarberita as $index)
            <div class="d-flex mb-4">
              {{-- <img src="img/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;"> --}}
              <div class="ps-3">
                <h6>{{$index->title}}</h6>
                <p>{{ Str::limit(strip_tags($index->description), 20) }}</p>
              </div>
            </div>
            @endforeach
          </div>
          <!-- Comment List End -->
        </div>

        <!-- Sidebar Start -->
        <div class="col-lg-4">

          <!-- Recent Post Start -->
          <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
            <div class="section-title section-title-sm position-relative pb-3 mb-4">
              <h3 class="mb-0">Donatur</h3>
            </div>
            @foreach ($transaksi as $index)
            <div class="p-4">
              <h6 class="mb-3">
                @if ($index->anonim==1)
                    Anonim
                    @else
                    {{$index->nama_donatur}}
                @endif
            </h6>
              <p><i>{{$index->doa}}</i></p>
              {{-- format number --}}
              <p>Rp. {{ number_format($index->nominal, 0, ',', '.') }}</p>
            </div>
            @endforeach
            <div class="p-4">
              <p>Lihat Selengkapnya</p>
            </div>
          </div>
          <!-- Recent Post End -->

          <!-- Category Start -->
          <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
            <div class="section-title section-title-sm position-relative pb-3 mb-4">
              <h3 class="mb-0">Transaksi</h3>
            </div>
            <form>
              <div class="row g-3">
                <div class="col-12 col-sm-6">
                  <input type="text" class="form-control bg-white border-0" placeholder="Your Name"
                    style="height: 55px;">
                </div>
                <div class="col-12 col-sm-6">
                  <input type="email" class="form-control bg-white border-0" placeholder="Your Email"
                    style="height: 55px;">
                </div>
                <div class="col-12">
                  <input type="text" class="form-control bg-white border-0" placeholder="Your Phone (Optional)"
                    style="height: 55px;">
                </div>
                <div class="col-12">
                  <input type="text" class="form-control bg-white border-0" placeholder="Nominal"
                    style="height: 55px;">
                </div>
                <div class="col-12">
                  <textarea class="form-control bg-white border-0" rows="5" placeholder="Doa"></textarea>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100 py-3" type="submit">Leave Your Comment</button>
                </div>
              </div>
            </form>
          </div>
          <!-- Category End -->

          <!-- Tags Start -->
          <!-- <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                          <div class="section-title section-title-sm position-relative pb-3 mb-4">
                              <h3 class="mb-0">Tag Cloud</h3>
                          </div>
                          <div class="d-flex flex-wrap m-n1">
                              <a href="" class="btn btn-light m-1">Design</a>
                              <a href="" class="btn btn-light m-1">Development</a>
                              <a href="" class="btn btn-light m-1">Marketing</a>
                              <a href="" class="btn btn-light m-1">SEO</a>
                              <a href="" class="btn btn-light m-1">Writing</a>
                              <a href="" class="btn btn-light m-1">Consulting</a>
                              <a href="" class="btn btn-light m-1">Design</a>
                              <a href="" class="btn btn-light m-1">Development</a>
                              <a href="" class="btn btn-light m-1">Marketing</a>
                              <a href="" class="btn btn-light m-1">SEO</a>
                              <a href="" class="btn btn-light m-1">Writing</a>
                              <a href="" class="btn btn-light m-1">Consulting</a>
                          </div>
                      </div> -->
          <!-- Tags End -->
        </div>
        <!-- Sidebar End -->
      </div>
    </div>
  </div>
@endsection

@section('carousel')
  <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
    <div class="row py-5">
      <div class="col-12 pt-lg-5 mt-lg-5 text-center">
        <h1 class="display-4 text-white animated zoomIn">{{ $kampanye->title }}</h1>
        <a href="" class="h5 text-white">Home</a>
        <i class="far fa-circle text-white px-2"></i>
        <a href="" class="h5 text-white">Blog Detail</a>
      </div>
    </div>
  </div>
@endsection
