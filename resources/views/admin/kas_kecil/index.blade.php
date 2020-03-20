@extends('admin.layouts.app')

@section('title', 'Kas Kecil')

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
            @lang('kas_kecil.title')
            <small>@lang('kas_kecil.title_index')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">@lang('kas_kecil.title')</a></li>
            <li class="active">@lang('kas_kecil.title_index')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-download"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Debit</span>
                        <span class="info-box-number">Rp. {{ number_format($totalDebit,2) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-upload"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Kredit</span>
                        <span class="info-box-number">Rp. {{ number_format($totalKredit,2) }}</span>
                    </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Saldo</span>
                        <span class="info-box-number">Rp. {{ number_format($totalSaldo,2) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <a href="{{ route('kas-kecil.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('global.btn_add_new')</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>@lang('kas_kecil.index_tanggal_th')</th>
                                    <th>@lang('kas_kecil.index_keterangan_th')</th>
                                    <th>@lang('kas_kecil.index_debit_th')</th>
                                    <th>@lang('kas_kecil.index_kredit_th')</th>
                                    <th>@lang('kas_kecil.index_action_th')</th>
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
                text: "Apakah anda yakin akan menghapus data kas kecil ?",
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
                    url     : '{!! route('kas-kecil.ajax.datatable') !!}',
                },
                columns       : [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false , width: '50px'},
                    {data: 'tanggal', name: 'tanggal'},                    
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'debit', name: 'debit'},
                    {data: 'kredit', name: 'kredit'},
                    {data: 'action', name: 'action', orderable: false, searchable: false,}
                ]
            });
        });
    </script>
@endpush