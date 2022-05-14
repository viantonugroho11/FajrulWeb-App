@extends('admin.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Peserta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Peserta</li>
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
                <a href="{{route('admin.acara.peserta',$acara->id)}}" class="btn btn-sm btn-success">Tambah Data</a>
                <a href="{{route('acara.create')}}" class="btn btn-sm btn-success">Import Data</a>
                <a href="{{route('acara.create')}}" class="btn btn-sm btn-success">Export Data</a>
                <a href="{{route('acara.create')}}" class="btn btn-sm btn-success">Template Import</a>
                </div>
                <div class="card-header">
                    <span>EVENT ID : {{$acara->id}}</span>
                </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Acara</h3>
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
                      <th>Nama</th>
                      <th>Email</th>
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
        ajax: "{{ route('acara.show',$acara->id) }}",
        columns: [
          // {data: 'id', name: 'id'},
          {
            data: 'nama',
            name: 'nama'
          },
          {
            data: 'email',
            name: 'email'
          },
        ]
      });

    });
  </script>
  <script>
    //   $(function () {
    //     $("#example1").DataTable({
    //       "responsive": true, "lengthChange": false, "autoWidth": false,
    //       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    //     $('#example2').DataTable({
    //       "paging": true,
    //       "lengthChange": false,
    //       "searching": false,
    //       "ordering": true,
    //       "info": true,
    //       "autoWidth": false,
    //       "responsive": true,
    //     });
    //   });
  </script>
@endsection

@section('scriptCss')
  <!-- DataTables -->
  {{-- <link rel="stylesheet" href="{{asset('asset/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}"> --}}
@endsection
