@extends('admin.layouts.app')

@section('title', 'Tambah Kas Kecil')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('kas_kecil.title')
            <small>@lang('kas_kecil.title_add')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('kas-kecil.index') }}">@lang('kas_kecil.title')</a></li>
            <li class="active">@lang('kas_kecil.title_add')</li>
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
                        <a href="{{ route('kas-kecil.index') }}" class="btn btn-success"><i class="fa fa-chevron-left"></i> @lang('global.btn_back')</a>
                    </div>
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('kas-kecil.store') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                                <label for="tanggal">@lang('kas_kecil.form_kas_kecil_tanggal_label')</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" value="{{ old('tanggal') }}">
                                <div class="help-block">{{ $errors->first('tanggal') }}</div>
                            </div>

                            <div class="form-group  {{ $errors->has('keterangan') ? 'has-error' : '' }}">
                                <label for="keterangan">@lang('kas_kecil.form_kas_kecil_keterangan_label')</label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="{{ old('keterangan') }}">
                                <div class="help-block">{{ $errors->first('keterangan') }}</div>
                            </div>

                            <div class="form-group {{ $errors->has('debit') ? 'has-error' : '' }}">
                                <label for="debit">@lang('kas_kecil.form_kas_kecil_debit_label')</label>
                                <input type="text" class="form-control" id="debit" name="debit" placeholder="Debit" value="{{ old('debit') }}">
                                <div class="help-block">{{ $errors->first('debit') }}</div>
                            </div>

                            <div class="form-group  {{ $errors->has('kredit') ? 'has-error' : '' }}">
                                <label for="kredit">@lang('kas_kecil.form_kas_kecil_kredit_label')</label>
                                <input type="text" class="form-control" name="kredit" id="kredit" placeholder="Kredit" value="{{ old('kredit') }}">
                                <div class="help-block">{{ $errors->first('kredit') }}</div>
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
        $('#debit').number( true, 0 );
        $('#kredit').number( true, 0 );
    </script>
@endpush