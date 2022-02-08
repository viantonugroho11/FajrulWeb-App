@extends('admin.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Artikel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Artikel</li>
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
                <a href="{{ route('artikel.create') }}" class="btn btn-sm btn-success">Tambah Data</a>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Artikel</h3>
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
                      <th>Slug</th>
                      <th>Deskripsi Singkat</th>
                      <th>Status</th>
                      {{-- <th>Status</th> --}}
                      <th>Action</th>
                    </tr>
                  </thead>
                  {{-- <tbody>
                    @php
                        $i=1;
                    @endphp
                    @forelse ($datapura as $row)
                    <tr>
                      <td>{{$i++}}</td>

                      <td>{{$row->nama_pura}}</td>
                      <td>{{$row->jenis_nama}}</td>
                      <td>{{$row->kondisi_nama}}</td>
                      <td>{{$row->status_tanah_nama}}</td>
                      <td>{{$row->provinsi_nama}}</td>
                      <td>{{$row->kota_nama}}</td>
                      <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('datapura.destroy', $row->id) }}" method="POST">
                            <a href="{{ route('datapura.edit', $row->id) }}" class="btn btn-sm btn-success">Edit</a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                      </td>
                    </tr>
                    @empty

                    @endforelse
                  </tbody> --}}
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
  {{-- <script src="{{asset('asset/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('asset/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('asset/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('asset/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('asset/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('asset/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('asset/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('asset/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('asset/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
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
        ajax: "{{ route('artikel.index') }}",
        zerorows: 'Tidak Ada Data',
        //loading
        language: {
          processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
        },
        columns: [
          // {data: 'id', name: 'id'},
          {
            data: 'nama_artikel',
            name: 'nama_artikel'
          },
          {
            data: 'slug',
            name: 'slug'
          },
          {
            data: 'isi_singkat',
            name: 'isi_singkat'
          },
          {
            //dataif
            data: 'status',
            name: 'status',
            render: function(data, type, row, meta) {
              if (data == '1') {
                return '<span class="badge badge-success">Aktif</span>';
              } else if (data == '2') {
                return '<span class="badge badge-warning">Arsip</span>';
              } else {
                return '<span class="badge badge-danger">Tidak Aktif</span>';
              }
            }
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
