@extends('admin.layouts.app')

@section('title', 'Detail Pegawai')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('pegawai.title_detail')
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
                        <a href="{{ route('pegawai.index') }}" class="btn btn-success"><i class="fa fa-chevron-left"></i> @lang('global.btn_back')</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="200px">Nomor Induk</th>
                                    <td>:</td>
                                    <td>{{ $pegawai->nip }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td>:</td>
                                    <td>{{ $pegawai->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td>:</td>
                                    <td>{{ empty($pegawai->jabatan->nama) ? '-' : $pegawai->jabatan->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>:</td>
                                    <td>{{ $pegawai->tanggal_lahir->format('d-M-Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis kelamin</th>
                                    <td>:</td>
                                    <td>{{ $pegawai->jenis_kelamin == 0 ? 'Laki-laki' : 'Perempuan' }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td>:</td>
                                    <td>{{ $pegawai->nomor_telepon }}</td>
                                </tr>
                                <tr>
                                    <th>Status Perkawinan</th>
                                    <td>:</td>
                                    <td>{{ $pegawai->status_perkawinan == 0 ? 'Belum Kawin' : 'Kawin' }}</td>
                                </tr>
                                <tr>
                                    <th>Provinsi</th>
                                    <td>:</td>
                                    <td>{{ $pegawai->provinsi->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Kota</th>
                                    <td>:</td>
                                    <td>{{ $pegawai->kota->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat Lengkap</th>
                                    <td>:</td>
                                    <td>{{ $pegawai->alamat }}</td>
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