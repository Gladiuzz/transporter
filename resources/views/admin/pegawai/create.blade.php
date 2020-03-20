@extends('admin.layouts.app')

@section('title', 'Tambah Pegawai')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('pegawai.title')
            <small>@lang('pegawai.title_add')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('pegawai.index') }}">@lang('pegawai.title')</a></li>
            <li class="active">@lang('pegawai.title_add')</li>
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
                        <a href="{{ route('pegawai.index') }}" class="btn btn-success"><i class="fa fa-chevron-left"></i> @lang('global.btn_back')</a>
                    </div>
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('pegawai.store') }}">
                        @csrf
                        <div class="box-body">

                            <div class="form-group {{ $errors->has('nip') ? 'has-error' : '' }}">
                                <label for="nip">@lang('pegawai.form_pegawai_nip_label')</label>
                                <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="{{ old('nip') }}">
                                <div class="help-block">{{ $errors->first('nip') }}</div>
                            </div>

                            <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                                <label for="nama">@lang('pegawai.form_pegawai_nama_label')</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="{{ old('nama') }}">
                                <div class="help-block">{{ $errors->first('nama') }}</div>
                            </div>

                            <div class="form-group {{ $errors->has('jabatan_id') ? 'has-error' : '' }}">
                                <label for="jabatan_id">@lang('pegawai.form_pegawai_jabatan_id_label')</label>
                                <select name="jabatan_id" id="" class="form-control">
                                    <option value=""> [ Pilih Jabatan ]</option>
                                    @foreach($dataJabatan as $jabatan)
                                        <option value="{{ $jabatan->id }}" {{ old('jabatan_id') == $jabatan->id ? 'selected' : '' }}>{{ $jabatan->nama }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block">{{ $errors->first('jabatan_id') }}</div>
                            </div>

                            <div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : '' }}">
                                <label for="tanggal_lahir">@lang('pegawai.form_pegawai_tanggal_lahir_label')</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                <div class="help-block">{{ $errors->first('tanggal_lahir') }}</div>
                            </div>

                            <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                                <label for="jenis_kelamin">@lang('pegawai.form_pegawai_jenis_kelamin_label')</label>
                                <select name="jenis_kelamin" id="" class="form-control">
                                    <option value="">[ Pilih Jenis Kelamin ]</option>
                                    <option value="0" {{ old('jenis_kelamin') == '0' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="1" {{ old('jenis_kelamin') == '1' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                <div class="help-block">{{ $errors->first('jenis_kelamin') }}</div>
                            </div>

                            <div class="form-group {{ $errors->has('nomor_telepon') ? 'has-error' : '' }}">
                                <label for="nomor_telepon">@lang('pegawai.form_pegawai_nomor_telepon_label')</label>
                                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon" value="{{ old('nomor_telepon') }}">
                                <div class="help-block">{{ $errors->first('nomor_telepon') }}</div>
                            </div>

                            <div class="form-group {{ $errors->has('status_perkawinan') ? 'has-error' : '' }}">
                                <label for="status_perkawinan">@lang('pegawai.form_pegawai_status_perkawinan_label')</label>
                                <select name="status_perkawinan" id="" class="form-control">
                                    <option value="">[ Pilih Status Perkawinan ]</option>
                                    <option value="0" {{ old('status_perkawinan') == '0' ? 'selected' : '' }}>Belum Kawin</option>
                                    <option value="1" {{ old('status_perkawinan') == '1' ? 'selected' : '' }}>Kawin</option>
                                </select>
                                <div class="help-block">{{ $errors->first('status_perkawinan') }}</div>
                            </div>

                            <div class="form-group {{ $errors->has('provinsi_id') ? 'has-error' : '' }}">
                                <label for="provinsi_id">@lang('pegawai.form_pegawai_provinsi_id_label')</label>
                                <select name="provinsi_id" id="provinsi" class="form-control">
                                    <option value=""> [ Pilih Provinsi ]</option>
                                    @foreach($dataProvinsi as $provinsi)
                                        <option value="{{ $provinsi->id }}" {{ old('provinsi_id') == $provinsi->id ? 'selected' : '' }}>{{ $provinsi->nama }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block">{{ $errors->first('provinsi_id') }}</div>
                            </div>

                            <div class="form-group {{ $errors->has('kota_id') ? 'has-error' : '' }}">
                                <label for="kota_id">@lang('pegawai.form_pegawai_kota_id_label')</label>
                                <select name="kota_id" id="kota" class="form-control">
                                    <option value=""> [ Pilih Kota/Kabupaten ]</option>
                                </select>
                                <div class="help-block">{{ $errors->first('kota_id') }}</div>
                            </div>

                            <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                                <label for="alamat">@lang('pegawai.form_pegawai_alamat_label')</label>
                                <textarea name="alamat" id="" cols="30" rows="10" class="form-control" placeholder="Alamat">{{ old('alamat') }}</textarea>
                                <div class="help-block">{{ $errors->first('alamat') }}</div>
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

        $(function() {
            var e = document.getElementById("provinsi");
			var update_provinsi_id = e.options[e.selectedIndex].value;
			if(update_provinsi_id != ""){
				$.ajax({
					url: '{{ url('kota/data/') }}/' + update_provinsi_id,
					type: 'JSON',
					method: 'GET',
					success:function(data){
						var data_kota = '<option value="">Pilih Kota</option>';
						$.each(data,function(i,e){
							var kota_id = "{{ $errors->any() ? old('kota_id') : ''}}";
							var selected = kota_id == e.id ? "selected" : "";
							data_kota += '<option value="'+e.id+'"'+selected+'>'+e.nama+'</option>';
						});

						$('#kota').html(data_kota);
					}
				});
            }
            
			$(document).on('change','#provinsi',function(){
				var provinsi_id = $(this).val();
                if(provinsi_id == "") {
                    $('#kota').html('<option value=""> [ Pilih Kota/Kabupaten ]</option>');
                } else {
                    console.log(provinsi_id);
                    $.ajax({
                        url: '{{ url('/kota/data') }}/' + provinsi_id,
                        type: 'JSON',
                        method: 'GET',
                        beforeSend:function() {
                            $('#kota').html('<option value="">....</option>');
                        },
                        success:function(data){
                            var data_kota = '<option value=""> [ Pilih Kota/Kabupaten ]</option>';
                            $.each(data,function(i,e){
                                data_kota += '<option value="'+e.id+'">'+e.nama+'</option>';
                            });

                            $('#kota').html(data_kota);
                        }
				    });
                }
			});
        });
    </script>
@endpush