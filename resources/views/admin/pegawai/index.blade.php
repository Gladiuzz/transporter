@extends('admin.layouts.app')

@section('title', 'Pegawai')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/toastr.min.css') }}">
    <style>
        .swal2-container {
            zoom: 1.5;
        }
    </style>
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('pegawai.title')
            <small>@lang('pegawai.title_index')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">@lang('pegawai.title')</a></li>
            <li class="active">@lang('pegawai.title_index')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <a href="{{ route('pegawai.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('global.btn_add_new')</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>@lang('pegawai.index_nip_th')</th>
                                    <th>@lang('pegawai.index_nama_th')</th>
                                    <th>@lang('pegawai.index_jenis_kelamin_th')</th>
                                    <th>@lang('pegawai.index_jabatan_th')</th>
                                    <th>@lang('pegawai.index_action_th')</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
@endsection

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('assets/dist/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <script>
        function deleteConfirm(id) {
            Swal.fire({
                text: "Apakah anda yakin akan menghapus data pegawai ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
                }).then((result) => {
                if (result.value) {
                    $('#submit_'+id).submit();
                    Swal.fire(
                    'Deleted!',
                    'Data jabatan dihapus',
                    'success'
                    )

                }
            })
        }

        $(function() {
            $('#datatable').DataTable({
                aaSorting     : [[0, 'desc']],
                iDisplayLength: 10,
                // stateSave     : true,
                responsive    : true,
                processing    : true,
                serverSide    : true,
                ajax          : {
                    url     : '{!! route('pegawai.ajax.datatable') !!}',
                },
                columns       : [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false , width: '50px'},
                    {data: 'nip', name: 'nip'},
                    {data: 'nama', name: 'nama'},
                    {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                    {data: 'jabatan_id', name: 'jabatan_id'},
                    {data: 'action', name: 'action', orderable: false, searchable: false,}
                ]
            });
        });
    </script>
@endpush
