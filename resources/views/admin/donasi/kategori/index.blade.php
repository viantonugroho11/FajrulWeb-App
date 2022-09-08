@extends('admin.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Kategori Donasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Kategori Donasi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                <a href="{{route('admin.donasi.kategori-donasi.create')}}" class="btn btn-sm btn-success">Tambah Data</a>
                </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kategori Donasi</h3>
                {{-- <br/> --}}
                {{-- <a href="{{route('DataPura.create')}}" class="btn btn-sm btn-success">Tambah Data</a> --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                {{-- @include('partials.filter') --}}

                <br />
                <table id="example1" class="table table-bordered data-table">
                  <thead>
                    <tr>
                      {{-- <th>No</th> --}}
                      <th>Nama</th>
                      {{-- <th>Jumlah Kampaye</th> --}}
                      {{-- <th>Icon</th> --}}
                      {{-- <th>Status</th> --}}
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                  </tfoot>
                </table>
                <br />
                {{-- {!! $datapura->links('pagination::bootstrap-4') !!} --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        {{-- selesai --}}
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('scriptJs')
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    //message with toastr
    @if (session()->has('success'))

      toastr.success('{{ session('success') }}', 'BERHASIL!');

    @elseif(session()->has('error'))

      toastr.error('{{ session('error') }}', 'GAGAL!');

    @endif
  </script>
  <script type="text/javascript">
    $(function() {

      var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        language: {
          processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
        },
        ajax: "{{ route('admin.donasi.kategori-donasi.index') }}",
        columns: [
          {
            data: 'title',
            name: 'title'
          },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
          },
        ]
      });

    });
  </script>
@endsection

@section('scriptCss')
  <!-- DataTables -->
  {{-- <link rel="stylesheet" href="{{asset('asset/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}"> --}}
@endsection
