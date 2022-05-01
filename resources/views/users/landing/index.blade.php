@extends('users.master')

@section('content')
<div class="container" style="margin-bottom: 9rem;">
  <div class="row">
    <div class="col-md-6 align-self-center" style="padding: 0;text-align: center;"><img src="/assets/img/about-lp-img.png?h=daa792aaee5dee417b39dfbf0a598566" style="width: 80%;height: auto;"></div>
    <div class="col-md-6 align-self-center" style="padding: 0;font-family: Poppins, sans-serif;background: rgba(255,255,255,0);">
      <div class="card" style="border-style: none;background: rgba(255,255,255,0);">
        <div class="card-body" style="border-style: none;background: rgba(255,255,255,0);">
          <h4 class="card-title" style="border-style: none;font-family: Poppins, sans-serif;font-weight: bold;font-size: 44px;background: rgba(255,255,255,0);">
            Title</h4>
          <p class="card-text" style="border-style: none;">Nullam id dolor id nibh ultricies vehicula ut id elit.
            Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
            metus.</p><button class="btn btn-primary" type="button" style="background: rgba(47, 49, 61, 1);height: 50px;width: 210px;color: rgba(243, 243, 243, 1);border-radius: 30px;box-shadow: 0px 6px 20px rgba(47,49,61,0.25);border-style: none;">Lihat
            Selengkapnya</button>
        </div>
      </div>
    </div>
  </div>
</div><!-- End: 1 Row 2 Columns -->
<!-- Start: 1 Row 2 Columns -->
<div class="container" style="margin-bottom: 9rem;">
  <div class="row">
    <div class="col-md-6 align-self-center" style="text-align: center;padding: 0;">
      <div class="card" style="border-style: none;background: rgba(255,255,255,0);">
        <div class="card-body" style="border-style: none;text-align: center;background: rgba(255,255,255,0);">
          <h4 class="card-title" style="border-style: none;text-align: center;font-size: 44px;font-family: Poppins, sans-serif;margin-bottom: 2rem;font-weight: bold;">
            10+ Program Kerja<br>Terealisasikan</h4><button class="btn btn-primary" type="button" style="background: rgba(47, 49, 61, 1);text-align: center;height: 50px;width: 210px;border-radius: 30px;border-style: none;box-shadow: 0px 6px 20px rgba(47, 49, 61, 0.25);">Lihat
            Selengkapnya</button>
        </div>
      </div>
    </div>
    <div class="col-md-6 align-self-center" style="padding: 0;"><img src="/assets/img/proker-img.png?h=e8fdf7d7c8a9466a54334e46a39c8322" style="width: 80%;height: auto;"></div>
  </div>
</div><!-- End: 1 Row 2 Columns -->
<!-- Start: 2 Rows 1+1 Columns -->
<div class="container" style="margin-bottom: 9rem;">
  <div class="row">
    <div class="col d-xxl-flex align-items-xxl-center" style="background: rgba(255,255,255,0);">
      <div class="card" style="background: rgba(255,255,255,0);border-style: none;">
        <div class="card-body" style="background: rgba(255,255,255,0);">
          <h4 class="card-title" style="font-size: 44px;font-weight: bold;">BLOG</h4>
        </div>
      </div>
    </div>
    <div class="col d-xxl-flex justify-content-xxl-end align-items-xxl-center">
      <div class="card" style="border-style: none;background: rgba(255,255,255,0);">
        <div class="card-body" style="text-align: right;font-size: 23px;"><a class="card-link" href="#" style="color: rgb(2,20,45);font-family: Poppins, sans-serif;border-style: none;">More &gt;</a></div>
      </div>
    </div>
  </div>
  <div class="row d-xxl-flex justify-content-xxl-center align-items-xxl-center" style="height: 600px;background: rgba(47, 49, 61, 1);border-radius: 20px;margin: 0px;box-shadow: 0px 15px 40px 0px rgba(33,37,41,0.5);">
    <div class="col-md-12 text-start d-xxl-flex align-items-center align-self-center justify-content-xxl-center" style="margin: 0px;padding: 0px;">
      <div class="card-group" style="
                  width: 1200px;height: 500px;
                  padding: 2%;color: rgba(243, 243, 243, 1);font-family: Poppins, sans-serif;">
        {{-- <div class="card d-xxl-flex" style="margin: 1rem;border-radius: 20px;background: rgba(243,243,243,0.2);">
            <div class="card-body" style="text-align: right;">
              <h4 class="card-title" style="text-align: left;background: rgba(243,243,243,0);font-size: 30px;">Title
              </h4>
              <p class="card-text" style="text-align: left;background: rgba(243,243,243,0);">Nullam id dolor id nibh
                ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit
                non mi porta gravida at eget metus.</p><button class="btn btn-primary" type="button"
                style="background: rgba(13,110,253,0);border-style: none;">Button</button>
            </div>
          </div> --}}

        @forelse ($artikel as $item)
        <div class="card col-md-4" style="margin: 1rem;width: 100%;height: auto;border-radius: 20px;background: rgba(243,243,243,0.2);">
          <div class="card-body" style="text-align: right;border-radius: 0;">
            <h4 class="card-title" style="text-align: left;font-family: rgba(243, 243, 243, 1);font-size: 30px;">
              {{ $item->nama_artikel }}
            </h4>
            <div class="limit-text">
              <p class="card-text demolength2" style="text-align: left;font-family: rgba(243, 243, 243, 1);">
                {!! $item->isi_singkat !!}
              </p>
            </div>
            <a class="btn btn-primary" type="button" style="background: rgba(13,110,253,0);border-style: none;">
              Button
            </a>
          </div>
        </div>
        @empty

        <div class="card" style="margin: 1rem;width: 100%;height: auto;border-radius: 20px;background: rgba(243,243,243,0.2);">
          <div class="card-body" style="text-align: right;border-radius: 0;">
            <h4 class="card-title" style="text-align: left;font-family: rgba(243, 243, 243, 1);font-size: 30px;">
              Tidak ada Judul</h4>
            <p class="card-text" style="text-align: left;font-family: rgba(243, 243, 243, 1);">
              Tidak ada Artikel</p><button class="btn btn-primary" type="button" style="background: rgba(13,110,253,0);border-style: none;">Button</button>
          </div>
        </div>

        @endforelse

        {{-- <div class="card" style="margin: 1rem;border-radius: 20px;background: rgba(243,243,243,0.2);">
            <div class="card-body" style="text-align: right;">
              <h4 class="card-title" style="text-align: left;font-size: 30px;">Title</h4>
              <p class="card-text" style="text-align: left;">Nullam id dolor id nibh ultricies vehicula ut id elit.
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
                metus.</p><button class="btn btn-primary" type="button"
                style="background: rgba(13,110,253,0);border-style: none;">Button</button>
            </div>
          </div> --}}
      </div>
    </div>
  </div>
</div><!-- End: 2 Rows 1+1 Columns -->
<!-- Start: 2 Rows 1+1 Columns -->
<div class="container" style="margin-bottom: 9rem;">
  <div class="row">
    <div class="col  d-xxl-flex align-items-xxl-center" style="background: rgba(255,255,255,0);">
      <div class="card" style="background: rgba(255,255,255,0);border-style: none;">
        <div class="card-body" style="background: rgba(255,255,255,0);">
          <h4 class="card-title" style="font-size: 44px;font-weight: bold;">ACARA</h4>
        </div>
      </div>
    </div>
    <div class="col d-xxl-flex justify-content-xxl-end align-items-xxl-center">
      <div class="card" style="border-style: none;background: rgba(255,255,255,0);">
        <div class="card-body" style="text-align: right;font-size: 23px;"><a class="card-link" href="#" style="color: rgb(2,20,45);font-family: Poppins, sans-serif;border-style: none;">More &gt;</a></div>
      </div>
    </div>
  </div>
  <div class="row d-xxl-flex justify-content-xxl-center align-items-xxl-center" style="height: 600px;background: rgba(47, 49, 61, 1);border-radius: 20px;margin: 0px;box-shadow: 0px 15px 40px 0px rgba(33,37,41,0.5);">
    <div class="col-md-12 text-start d-xxl-flex align-items-center align-self-center justify-content-xxl-center" style="margin: 0px;padding: 0px;">
      <div class="card-group" style="width: 1200px;height: 500px;padding: 2%;color: rgba(243, 243, 243, 1);font-family: Poppins, sans-serif;">

        @forelse ($acara as $item)
        <div class="card d-xxl-flex" style="margin: 1rem;border-radius: 20px;background: rgba(243,243,243,0.2);">
          <div class="card-body" style="text-align: right;">
            <h4 class="card-title" style="text-align: left;background: rgba(243,243,243,0);font-size: 30px;">
              {{ $item->nama }}
            </h4>
            <p class="card-text" style="text-align: left;background: rgba(243,243,243,0);">
              {{$item->deskripsi_singkat}}
            </p>
            <button class="btn btn-primary" type="button" style="background: rgba(13,110,253,0);border-style: none;">Button</button>
          </div>
        </div>
        @empty
        <div class="card d-xxl-flex" style="margin: 1rem;border-radius: 20px;background: rgba(243,243,243,0.2);">
          <div class="card-body" style="text-align: right;">
            <h4 class="card-title" style="text-align: left;background: rgba(243,243,243,0);font-size: 30px;">
            </h4>
            <p class="card-text" style="text-align: left;background: rgba(243,243,243,0);">Tidak ada acara</p><button class="btn btn-primary" type="button" style="background: rgba(13,110,253,0);border-style: none;">Button</button>
          </div>
        </div>
        @endforelse
        {{-- <div class="card"
            style="margin: 1rem;width: 100%;height: auto;border-radius: 20px;background: rgba(243,243,243,0.2);">
            <div class="card-body" style="text-align: right;border-radius: 0;">
              <h4 class="card-title" style="text-align: left;font-family: rgba(243, 243, 243, 1);font-size: 30px;">
                Title</h4>
              <p class="card-text" style="text-align: left;font-family: rgba(243, 243, 243, 1);">Nullam id dolor id
                nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id
                elit non mi porta gravida at eget metus.</p><button class="btn btn-primary" type="button"
                style="background: rgba(13,110,253,0);border-style: none;">Button</button>
            </div>
          </div>
          <div class="card" style="margin: 1rem;border-radius: 20px;background: rgba(243,243,243,0.2);">
            <div class="card-body" style="text-align: right;">
              <h4 class="card-title" style="text-align: left;font-size: 30px;">Title</h4>
              <p class="card-text" style="text-align: left;">Nullam id dolor id nibh ultricies vehicula ut id elit.
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
                metus.</p><button class="btn btn-primary" type="button"
                style="background: rgba(13,110,253,0);border-style: none;">Button</button>
            </div>
          </div> --}}
      </div>
    </div>
  </div>
</div><!-- End: 2 Rows 1+1 Columns -->
@endsection

@section('css')
<style>
  .demolength1 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
  }

  .limit-text {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 12;
    -webkit-box-orient: vertical;
  }
</style>
@endsection