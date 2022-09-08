@extends('admin.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Donasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.donasi.kampanye.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Judul</label>
                        <input name="title" type="text" class="form-control" id="exampleInputEmail1"
                          placeholder="Judul Donasi">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Kategori</label>
                        {{-- <input name="nama" type="text" class="form-control" id="exampleInputEmail1"
                          placeholder="Judul Artikel"> --}}
                        <select name="kategori" class="form-control select2" style="width: 100%;">
                          <option selected="selected" value="">Pilihan</option>
                          @foreach ($kategoridonasi as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Target Donasi</label>
                        <input name="target" type="number" class="form-control" id="exampleInputEmail1"
                          placeholder="Target Donasi">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Gambar</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input name="foto" type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        {{-- <input name="nama" type="text" class="form-control" id="exampleInputEmail1"
                          placeholder="Judul Artikel"> --}}
                        <select name="status" class="form-control select2" style="width: 100%;">
                          <option selected="selected" value="">Pilihan</option>
                          <option value="0">Pending</option>
                          <option value="2">Simpan</option>
                          @if ('1' == Auth::user()->role_id)
                            <option value="1">Publish</option>
                          @else
                            <option value="1" disabled>Publish</option>
                          @endif
                          {{-- @foreach ($kategori as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach --}}
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Target Tanggal Donasi</label>
                        <input name="target_tanggal" type="date" class="form-control" id="exampleInputEmail1"
                          placeholder="Target Tanggal Donasi">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    {{-- //isisingkat --}}
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ringkasan</label>
                      <textarea name="isi_singkat" class="form-control" id="exampleInputEmail1" placeholder="Isi Artikel"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Isi Artikel</label>
                      <textarea class="isiArtikel @error('detail') is-invalid @enderror" name="detail"
                        style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      @error('detail')
                        <div class="alert alert-danger mt-2">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('scriptJs')
  <!-- Summernote -->
  <script src="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <script>
    $(function() {
      //note
      $('.isiArtikel').summernote()
    })
  </script>
@endsection

@section('scriptCss')
  <!-- Summernote -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/summernote/summernote-bs4.css') }}">
@endsection
