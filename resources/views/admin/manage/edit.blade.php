@extends('admin.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Admin

            </h1>
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
              <form action="{{ route('manage.update',$admin->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="nama" value="{{old('nama',$admin->name)}}" type="text" class="form-control" id="exampleInputEmail1"
                      placeholder="Masukan Nama Kategori">
                  </div>
                  {{-- email --}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="email" value="{{old('email',$admin->email)}}" class="form-control" id="exampleInputEmail1"
                      placeholder="Masukan Nama Kategori">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputEmail1"
                      placeholder="Masukan Nama Kategori">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Role</label>
                    <select name="role" class="form-control">
                      @if (Auth::user()->role_id == 1)
                        <option value="1">Super Admin</option>
                        <option value="2">User</option>
                      @endif
                      @if (Auth::user()->role_id == 2 || Auth::user()->role_id == 1)
                        <option value="3">Anggota</option>
                        <option value="4">Content Writer</option>
                      @endif
                    </select>
                  </div>
                  {{-- <div class="form-group">
                    <label for="exampleInputFile">Icon</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="icon" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> --}}
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
