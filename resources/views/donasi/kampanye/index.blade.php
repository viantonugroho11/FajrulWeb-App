@extends('donasi.master')
@section('content')
  <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
      <div class="row g-5">
        <!-- Blog list Start -->
        <div class="row g-5">
          <div class="col-lg-4">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Pilih Kategori</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option value="">Semua Kategori</option>
                @foreach ($kategori as $index)
                  <option value="{{ $index->slug }}">{{ $index->title }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <!-- form select Category -->

          <div class="row g-5">
            @forelse ($kampanye as $index)
              <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="blog-item bg-light rounded overflow-hidden">
                  <div class="blog-img position-relative overflow-hidden">
                    @if ($index->image == null)
                      <img class="img-fluid" src="{{ asset('assets/no-image.jpg') }}" alt="">
                    @else
                      <img class="img-fluid" src="{{ $index->getImageAttribute() }}" alt="">
                    @endif
                    <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4"
                      href="">{{ $index->kategori_donasi->title }}</a>
                  </div>
                  <div class="p-4">
                    <div class="d-flex mb-3">
                      <small class="me-3">
                        <i class="far fa-money-bill-alt text-primary me-2"></i>$100
                      </small>
                      <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</small>
                    </div>
                    <h4 class="mb-3">{{ $index->title }}</h4>
                    <p>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                    </p>
                    <p>{{ Str::limit(strip_tags($index->description), 20) }}</p>
                    <a class="text-uppercase" href="{{ route('donasi.kampanye.show', $index->slug) }}">Baca Lengkap<i
                        class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="blog-item bg-light rounded overflow-hidden">
                  <div class="blog-img position-relative overflow-hidden">

                    <img class="img-fluid" src="{{ asset('assets/no-image.jpg') }}" alt="">
                    <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4"
                      href=""></a>
                  </div>
                  <div class="p-4">
                    <div class="d-flex mb-3">
                      <small class="me-3"><i class="far fa-user text-primary me-2"></i></small>
                      <small><i class="far fa-calendar-alt text-primary me-2"></i></small>
                    </div>
                    <h4 class="mb-3">No Data</h4>
                    <p></p>
                    <a class="text-uppercase" href="#">Baca Lengkap<i class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            @endforelse

            <div class="col-12 wow slideInUp" data-wow-delay="0.1s">
              <nav aria-label="Page navigation">
                <ul class="pagination pagination-lg m-0">
                  <li class="page-item disabled">
                    <a class="page-link rounded-0" href="#" aria-label="Previous">
                      <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                    </a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link rounded-0" href="#" aria-label="Next">
                      <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <!-- Blog list End -->
      </div>
    </div>
  </div>
@endsection

@section('carousel')
  <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="w-100" src="{{ asset('assets/frontend/donasi/img/carousel-1.jpg') }}" alt="Image">
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
          <div class="p-3" style="max-width: 900px;">
            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Creative & Innovative Digital Solution</h1>
            <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free Quote</a>
            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="w-100" src="{{ asset('assets/frontend/donasi/img/carousel-2.jpg') }}" alt="Image">
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
          <div class="p-3" style="max-width: 900px;">
            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Creative & Innovative Digital Solution</h1>
            <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free Quote</a>
            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
@endsection
