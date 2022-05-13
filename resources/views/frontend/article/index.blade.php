@extends('frontend.master')

@section('content')
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcrumb-area">
  <div class="container h-100">
    <div class="row h-100 align-items-end">
      <div class="col-12">
        <div class="breadcumb--con">
          <h2 class="title">Blog</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ***** Blog Area Start ***** -->
<div class="uza-blog-area section-padding-80">
  <div class="container">
    <div class="row">

      @foreach ($artikels as $item)
      <div class="col-12 col-lg-4">
        <div class="single-blog-post bg-img mb-80" style="height:31rem !important; background-image: url(./img/bg-img/8.jpg);">
          <div class="post-content">
            <span class="post-date">{{ $item->created_at }}</span>

            <a href="{{ route('landing.blog.show', $item->slug) }}" class="post-title">{{ Str::limit($item->nama_artikel, 33, '...') }}</a>
            <p>{{ Str::limit($item->isi_singkat, 221, '...') }}</p>
            <a href="{{ route('landing.blog.show', $item->slug) }}" class="read-more-btn">Read More <i class="arrow_carrot-2right"></i></a>
            <span><i class="icon-eye"></i>Melihat Artikel: {{$item->viewer->count()}}</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="row">
      <div class="col-12 text-center">

        {!! $artikels->links('pagination::bootstrap-4') !!}
        {{-- <a href="#" class="btn uza-btn btn-3">Load More</a> --}}
      </div>
    </div>
  </div>
</div>
@endsection