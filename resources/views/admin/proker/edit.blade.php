@extends('admin.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Proker</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Proker</li>
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
              <form>
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Judul</label>
                        <input name="nama" type="text" class="form-control" id="exampleInputEmail1"
                          placeholder="Judul Proker">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Divisi</label>
                        {{-- <input name="nama" type="text" class="form-control" id="exampleInputEmail1"
                          placeholder="Judul Proker"> --}}
                        <select name="divisi" class="form-control select2" style="width: 100%;">
                          <option selected="selected" value="">Pilihan</option>
                          @foreach ($divisi as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}
                              @if ($item->regional == 1)
                                Depok - Kalimalang
                              @else
                                Karawaci
                              @endif
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Gambar</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input name="icon" type="file" class="custom-file-input" id="exampleInputFile">
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
                          <option selected="selected" value="0">Pending</option>
                          <option value="2">Simpan</option>
                          <option value="1" disabled>Publish</option>
                          {{-- @foreach ($kategori as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach --}}
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
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
