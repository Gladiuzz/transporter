@extends('admin.layouts.app')

@section('title', 'Tambah Jabatan')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('jabatan.title')
            <small>@lang('jabatan.title_add')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('jabatan.index') }}">@lang('jabatan.title')</a></li>
            <li class="active">@lang('jabatan.title_add')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <a href="{{ route('jabatan.index') }}" class="btn btn-success"><i class="fa fa-chevron-left"></i> @lang('global.btn_back')</a>
                    </div>
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('jabatan.store') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                                <label for="nama">@lang('jabatan.form_jabatan_nama_label')</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Jabatan" value="{{ old('nama') }}">
                                <div class="help-block">{{ $errors->first('nama') }}</div>
                            </div>
                            <div class="form-group  {{ $errors->has('gaji_pokok') ? 'has-error' : '' }}">
                                <label for="gajipokok">@lang('jabatan.form_jabatan_gaji_pokok_label')</label>
                                <input type="text" class="form-control" name="gaji_pokok" id="gajipokok" placeholder="Gaji Pokok" value="{{ old('gaji_pokok') }}">
                                <div class="help-block">{{ $errors->first('gaji_pokok') }}</div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">@lang('global.submit')</button>
                        </div>
                    </form>
                </div>
          <!-- /.box -->
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
@endsection

@push('scripts')
    <script src="{{ asset('assets/dist/js/jquery.number.js') }}"></script>
    <script>
        $('#gajipokok').number( true, 0 );
    </script>
@endpush