@extends('admin.layouts.app')

@section('title', 'Tambah Pengiriman')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('pengiriman.title')
            <small>@lang('pengiriman.title_add')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('pengiriman.index') }}">@lang('pengiriman.title')</a></li>
            <li class="active">@lang('pengiriman.title_add')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <form action="{{ route('pengiriman.store') }}" method="POST">
                    @csrf
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <a href="{{ route('pengiriman.index') }}" class="btn btn-success"><i class="fa fa-chevron-left"></i> @lang('global.btn_back')</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="nomor_invoice" class="col-sm-2 control-label">Nomor Invoice</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nomor_invoice" placeholder="Dibuat otomatis oleh sistem" name="nomor_invoice" readonly>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">                            
                                    <label for="tanggal" class="col-sm-2 control-label">tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="{{ old('tanggal') }}">
                                        <div class="help-block">{{ $errors->first('tanggal') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pengirim</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('perusahaan_asal') ? 'has-error' : '' }}">
                                    <label for="nama_perusahaan" class="col-sm-2 control-label">Nama Perusahaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_perusahaan" placeholder="Nama Perusahaan" value="{{ old('perusahaan_asal') }}" name="perusahaan_asal">
                                        <div class="help-block">{{ $errors->first('perusahaan_asal') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('alamat_asal') ? 'has-error' : '' }}">
                                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat_asal" id="alamat" cols="20" rows="5" class="form-control" placeholder="Alamat">{{ old('alamat_asal') }}</textarea>
                                        <div class="help-block">{{ $errors->first('alamat_asal') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('provinsi_asal_id') ? 'has-error' : '' }}">
                                    <label for="provinsi" class="col-sm-2 control-label">Provinsi</label>
                                    <div class="col-sm-10">
                                        <select name="provinsi_asal_id" id="provinsi_asal" class="form-control">
                                            <option value="">[ Pilih Provinsi ]</option>
                                            @foreach($dataProvinsi as $provinsi)
                                                <option value="{{ $provinsi->id }}" {{ old('provinsi_asal_id') == $provinsi->id ? 'selected' : '' }}>{{ $provinsi->nama }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block">{{ $errors->first('provinsi_asal_id') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('kota_asal_id') ? 'has-error' : '' }}">
                                    <label for="kota" class="col-sm-2 control-label">Kota</label>
                                    <div class="col-sm-10">
                                        <select name="kota_asal_id" id="kota_asal" class="form-control">
                                            <option value="">[ Pilih Kota ]</option>
                                        </select>
                                        <div class="help-block">{{ $errors->first('kota_asal_id') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('nomor_telepon_asal') ? 'has-error' : '' }}">
                                    <label for="nomor_telepon" class="col-sm-2 control-label">Nomor Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nomor_telepon" placeholder="Nomor Telepon" value="{{ old('nomor_telepon_asal') }}" name="nomor_telepon_asal">
                                        <div class="help-block">{{ $errors->first('nomor_telepon_asal') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('kode_pos_asal') ? 'has-error' : '' }}">
                                    <label for="kode_pos" class="col-sm-2 control-label">Kode Pos</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="kode_pos" placeholder="Kode Pos" value="{{ old('kode_pos_asal') }}" name="kode_pos_asal">
                                        <div class="help-block">{{ $errors->first('kode_pos_asal') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('negara_asal') ? 'has-error' : '' }}">
                                    <label for="negara" class="col-sm-2 control-label">Negara</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="negara" value="{{ old('negara_asal') }}" placeholder="Negara" name="negara_asal">
                                        <div class="help-block">{{ $errors->first('negara_asal') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Penerima</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('perusahaan_tujuan') ? 'has-error' : '' }}">
                                    <label for="nama_perusahaan" class="col-sm-2 control-label">Nama Perusahaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_perusahaan" placeholder="Nama Perusahaan" value="{{ old('perusahaan_tujuan') }}" name="perusahaan_tujuan">
                                        <div class="help-block">{{ $errors->first('perusahaan_tujuan') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('alamat_tujuan') ? 'has-error' : '' }}">
                                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat_tujuan" id="alamat" cols="20" rows="5" class="form-control" placeholder="Alamat">{{ old('alamat_tujuan') }}</textarea>
                                        <div class="help-block">{{ $errors->first('alamat_tujuan') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('provinsi_tujuan_id') ? 'has-error' : '' }}">
                                    <label for="provinsi" class="col-sm-2 control-label">Provinsi</label>
                                    <div class="col-sm-10">
                                        <select name="provinsi_tujuan_id" id="provinsi_tujuan" class="form-control">
                                            <option value="">[ Pilih Provinsi ]</option>
                                            @foreach($dataProvinsi as $provinsi)
                                                <option value="{{ $provinsi->id }}" {{ old('provinsi_tujuan_id') == $provinsi->id ? 'selected' : '' }}>{{ $provinsi->nama }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block">{{ $errors->first('provinsi_tujuan_id') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('kota_tujuan_id') ? 'has-error' : '' }}">
                                    <label for="kota" class="col-sm-2 control-label">Kota</label>
                                    <div class="col-sm-10">
                                        <select name="kota_tujuan_id" id="kota_tujuan" class="form-control">
                                            <option value="">[ Pilih Kota ]</option>
                                        </select>
                                        <div class="help-block">{{ $errors->first('kota_tujuan_id') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('nomor_telepon_tujuan') ? 'has-error' : '' }}">
                                    <label for="nomor_telepon" class="col-sm-2 control-label">Nomor Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nomor_telepon" placeholder="Nomor Telepon" name="nomor_telepon_tujuan" value="{{ old('nomor_telepon_tujuan') }}">
                                        <div class="help-block">{{ $errors->first('nomor_telepon_tujuan') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('kode_pos_tujuan') ? 'has-error' : '' }}">
                                    <label for="kode_pos" class="col-sm-2 control-label">Kode Pos</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="kode_pos" placeholder="Kode Pos" name="kode_pos_tujuan" value="{{ old('kode_pos_tujuan') }}">
                                        <div class="help-block">{{ $errors->first('kode_pos_tujuan') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('negara_tujuan') ? 'has-error' : '' }}">
                                    <label for="negara" class="col-sm-2 control-label">Negara</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="negara" placeholder="Negara" name="negara_tujuan" value="{{ old('negara_tujuan') }}">
                                        <div class="help-block">{{ $errors->first('negara_tujuan') }}</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Detail Pengiriman Barang</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('paket') ? 'has-error' : '' }}">
                                    <label for="nama_perusahaan" class="col-sm-2 control-label">Paket</label>
                                    <div class="col-sm-10">
                                        <select name="paket" id="" class="form-control">
                                            <option value="">[ Pilih Paket ]</option>
                                            <option value="0" {{ old('paket') == "0" ? 'selected' : '' }}>Reguler</option>
                                            <option value="1" {{ old('paket') == "1" ? 'selected' : '' }}>Express</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('jalur') ? 'has-error' : '' }}">
                                    <label for="nama_perusahaan" class="col-sm-2 control-label">Via</label>
                                    <div class="col-sm-10">
                                        <select name="jalur" id="jalur" class="form-control" onChange="totalVolume()">
                                            <option value="">[ Pilih jalur ]</option>
                                            <option value="0" {{ old('jalur') == "0" ? 'selected' : '' }}>Udara</option>
                                            <option value="1" {{ old('jalur') == "1" ? 'selected' : '' }}>Darat</option>
                                            <option value="2" {{ old('jalur') == "2" ? 'selected' : '' }}>Laut</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('jenis_barang') ? 'has-error' : '' }}">
                                    <label for="nama_perusahaan" class="col-sm-2 control-label">Jenis Barang</label>
                                    <div class="col-sm-10">
                                        <select name="jenis_barang" id="" class="form-control">
                                            <option value="">[ Pilih Jenis Barang ]</option>
                                            <option value="Dokumen" {{ old('jenis_barang') == "Dokumen" ? "selected" : "" }}>Dokumen</option>
                                            <option value="Makanan" {{ old("jenis_barang") == "Makanan" ? "selected" : "" }}>Makanan</option>
                                            <option value="Pakaian" {{ old("jenis_barang") == "Pakaian" ? "selected" : "" }}>Pakaian</option>
                                            <option value="Alat Kesehatan" {{ old("jenis_barang") == "Alat kesehatan" ? "selected" : "" }}>Alat Kesehatan</option>
                                            <option value="Elektronik" {{ old("jenis_barang") == "Elektronik" ? "selected" : "" }}>Elektronik</option>
                                            <option value="Kosmetik" {{ old("jenis_barang") == "Kosmetik" ? "selected" : "" }}>Kosmetik</option>
                                            <option value="Souvenir" {{ old("jenis_barang") == "Souvenir" ? "selected" : "" }}>Souvenir</option>
                                            <option value="Barang Antik" {{ old("jenis_barang") == "Barang Antik" ? "selected" : "" }}>Barang Antik</option>
                                            <option value="Peralatan Rumah Tangga" {{ old("jenis_barang") == "Peralatan Rumah Tangga" ? "selected" : "" }}>Peralatan Rumah Tangga</option>
                                            <option value="Lainnya" {{ old("jenis_barang") == "Lainnya" ? "selected" : "" }}>Lainnya</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('harga') ? 'has-error' : '' }}">                            
                                    <label for="harga" class="col-sm-2 control-label">Harga (Rp.)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="{{ old('harga') }}" onkeyup="totalVolume()">
                                        <div class="help-block">{{ $errors->first('harga') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('jenis_berat') ? 'has-error' : '' }}">
                                    <label for="jenis_berat" class="col-sm-2 control-label">Hitung Berdasarkan</label>
                                    <div class="col-sm-10">
                                        <select name="jenis_berat" id="jenis_berat" class="form-control" onchange="totalVolume()">
                                            <option value="">[ Pilih ]</option>
                                            <option value="0" {{ old('jenis_berat') == "0" ? 'selected' : '' }}>Berat</option>
                                            <option value="1" {{ old('jenis_berat') == "1" ? 'selected' : '' }}>Volume</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="berat_choice" style="display: {{ old('jenis_berat') == '0' ? 'block' : 'none' }};">
                                    <div class="form-group {{ $errors->has('berat') ? 'has-error' : '' }}">                            
                                        <label for="berat" class="col-sm-2 control-label">Berat (KG)</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="berat" id="berat" placeholder="berat" value="{{ old('berat') }}" onkeyup="totalVolume()">
                                            <div class="help-block">{{ $errors->first('berat') }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="volume_choice" style="display: {{ old('jenis_berat') == '1' ? 'block' : 'none' }};">
                                    <div class="form-group {{ $errors->has('panjang') ? 'has-error' : '' }}">                            
                                        <label for="panjang" class="col-sm-2 control-label">Panjang (CM)</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="panjang" id="panjang" placeholder="Panjang" value="{{ old('panjang') }}" onkeyup="totalVolume()">
                                            <div class="help-block">{{ $errors->first('panjang') }}</div>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('lebar') ? 'has-error' : '' }}">                            
                                        <label for="lebar" class="col-sm-2 control-label">Lebar (CM)</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="lebar" id="lebar" placeholder="Lebar" value="{{ old('lebar') }}" onkeyup="totalVolume()">
                                            <div class="help-block">{{ $errors->first('lebar') }}</div>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('tinggi') ? 'has-error' : '' }}">                            
                                        <label for="tinggi" class="col-sm-2 control-label">Tinggi (CM)</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="tinggi" id="tinggi" placeholder="Tinggi" value="{{ old('tinggi') }}" onkeyup="totalVolume()">
                                            <div class="help-block">{{ $errors->first('tinggi') }}</div>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('volume') ? 'has-error' : '' }}">                            
                                        <label for="volume" class="col-sm-2 control-label">Volume (Kg)</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="volume" id="volume" placeholder="volume" value="{{ old('volume') }}" readonly>
                                            <div class="help-block error-jalur" style="display:none;color:#dd4b39;">Isi jalur (via) pengiriman terlebih dahulu</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('koli') ? 'has-error' : '' }}">                            
                                    <label for="koli" class="col-sm-2 control-label">koli (Kg)</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="koli" id="koli" placeholder="Koli" value="{{ old('koli') }}">
                                        <div class="help-block">{{ $errors->first('koli') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('asuransi') ? 'has-error' : '' }}">                            
                                    <label for="asuransi" class="col-sm-2 control-label">Asuransi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="asuransi" id="asuransi" placeholder="asuransi" value="{{ old('asuransi') }}" onkeyup="totalVolume()">
                                        <div class="help-block">{{ $errors->first('asuransi') }}</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('subcharge') ? 'has-error' : '' }}">                            
                                    <label for="subcharge" class="col-sm-2 control-label">subcharge (%)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="subcharge" name="sub_charge" placeholder="Sub Charge" value="0" readonly value="{{ old('sub_charge') }}">
                                        <div class="help-block error-jalur" style="display:none;color:#dd4b39;">Isi jalur (via) pengiriman terlebih dahulu</div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('ongkos_kirim') ? 'has-error' : '' }}">                            
                                    <label for="ongkos_kirim" class="col-sm-2 control-label">Ongkos Kirim (Rp.)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="ongkos_kirim" value="{{ old('ongkos_kirim') }}" class="form-control" id="ongkos_kirim" placeholder="Ongkos Kirim" readonly>
                                        <div class="help-block error-ongkir" style="display:none;color:#dd4b39;">Pilih Jenis Perhitungan terlebih dahulu</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <button class="btn btn-primary" type="submit">@lang('global.submit')</button>

            </form>

        </div>
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
@endsection

@push('scripts')
    <script src="{{ asset('assets/dist/js/jquery.number.js') }}"></script>
    <script>
        $('#harga').number( true, 0 );
        $('#asuransi').number( true, 0 );
        getNomorInvoice();

        setInterval(function(){
            getNomorInvoice();
        },10000);

        function getNomorInvoice()
        {
            $.ajax({
            type: "GET",
            url: "{{ url('pengiriman/invoice/code') }}",
            success: function(data){
                $('#nomor_invoice').val(data);
                console.log(data);
            }
        });
        }

        // menghitung volume
        function totalVolume() {
            $('.error-jalur').hide();
            $('.error-ongkir').hide();
            var e = document.getElementById("jalur");
			var jalur = e.options[e.selectedIndex].value;

            var i = document.getElementById("jenis_berat");
			var jenis_berat = i.options[i.selectedIndex].value;
            
            var panjang = document.getElementById('panjang').value;
            var harga = $('#harga').number( true, 0 ).val();
            var asuransi = $('#asuransi').number( true, 0 ).val();
            var lebar = document.getElementById('lebar').value;
            var tinggi = document.getElementById('tinggi').value;

            // menghitung jumlah berat berdasarkan volume
            var totalVolume = 0;
            if(jalur == "0") {
                totalVolume = panjang * lebar * tinggi / 6000;
            } else if(jalur == "1") {
                totalVolume = panjang * lebar * tinggi / 4000;
            } else if (jalur == "2") {
                totalVolume = panjang * lebar * tinggi /100000;
            } else {
                totalVolume = 0;
                $('.error-jalur').show();
            }
		    document.getElementById('volume').value = totalVolume.toFixed(0);

            // tentukan jenis perhitungan berat

            var totalBerat =  0;
            if(jenis_berat == "0") {
                totalBerat = document.getElementById('berat').value;
            } else if(jenis_berat == "1") {
                totalBerat = totalVolume.toFixed(0);
            } else {
                totalBerat = 0;
            }

            // menghitung subcharge
            var subcharge = 0;
            if(totalBerat >= 151 && jalur != "") {
                subcharge = 125;
            } else if(totalBerat >= 51 && totalBerat <= 75 && jalur != "") {
                subcharge = 50;
            } else if(totalBerat >= 76 && totalBerat <= 100 && jalur != "") {
                subcharge = 75;
            } else if(totalBerat >= 101 && totalBerat <= 150 && jalur != "") {
                subcharge = 100;
            } else {
                subcharge = 0;
            }
            
		    document.getElementById('subcharge').value = subcharge;

            var biayaPerKg = harga *totalBerat;
            var biayaCharge =  (biayaPerKg * (subcharge/100));


            if(jenis_berat == "") {
                var ongkir = 0;
                $('.error-ongkir').show();
            } else {
                var ongkir = biayaPerKg + biayaCharge + (asuransi * 1);                
            }
		    document.getElementById('ongkos_kirim').value = $.number(ongkir,0);
        }

        $(function() {
            $('#jenis_berat').on('change', function() {
                if($(this).val() == "0") {
                    $('.berat_choice').show();
                    $('.volume_choice').hide();
                } else if($(this).val() == "1"){
                    $('.berat_choice').hide();
                    $('.volume_choice').show();
                } else {
                    $('.berat_choice').hide();
                    $('.volume_choice').hide();
                }
            });
            var e = document.getElementById("provinsi_asal");
			var update_provinsi_asal_id = e.options[e.selectedIndex].value;
			if(update_provinsi_asal_id != ""){
				$.ajax({
					url: '{{ url('kota/data/') }}/' + update_provinsi_asal_id,
					type: 'JSON',
					method: 'GET',
					success:function(data){
						var data_kota = '<option value="">Pilih Kota</option>';
						$.each(data,function(i,e){
							var kota_id = "{{ $errors->any() ? old('kota_asal_id') : ''}}";
							var selected = kota_id == e.id ? "selected" : "";
							data_kota += '<option value="'+e.id+'"'+selected+'>'+e.nama+'</option>';
						});

						$('#kota_asal').html(data_kota);
					}
				});
            }
            
			$(document).on('change','#provinsi_asal',function(){
				var provinsi_asal_id = $(this).val();
                if(provinsi_asal_id == "") {
                    $('#kota_asal').html('<option value=""> [ Pilih Kota/Kabupaten ]</option>');
                } else {
                    console.log(provinsi_asal_id);
                    $.ajax({
                        url: '{{ url('/kota/data') }}/' + provinsi_asal_id,
                        type: 'JSON',
                        method: 'GET',
                        beforeSend:function() {
                            $('#kota_asal').html('<option value="">....</option>');
                        },
                        success:function(data){
                            var data_kota = '<option value=""> [ Pilih Kota/Kabupaten ]</option>';
                            $.each(data,function(i,e){
                                data_kota += '<option value="'+e.id+'">'+e.nama+'</option>';
                            });

                            $('#kota_asal').html(data_kota);
                        }
				    });
                }
			});

            // tujuan
            var e = document.getElementById("provinsi_tujuan");
			var update_provinsi_tujuan_id = e.options[e.selectedIndex].value;
			if(update_provinsi_tujuan_id != ""){
				$.ajax({
					url: '{{ url('kota/data/') }}/' + update_provinsi_tujuan_id,
					type: 'JSON',
					method: 'GET',
					success:function(data){
						var data_kota = '<option value="">Pilih Kota</option>';
						$.each(data,function(i,e){
							var kota_id = "{{ $errors->any() ? old('kota_tujuan_id') : ''}}";
							var selected = kota_id == e.id ? "selected" : "";
							data_kota += '<option value="'+e.id+'"'+selected+'>'+e.nama+'</option>';
						});

						$('#kota_tujuan').html(data_kota);
					}
				});
            }
            
			$(document).on('change','#provinsi_tujuan',function(){
				var provinsi_tujuan_id = $(this).val();
                if(provinsi_tujuan_id == "") {
                    $('#kota_tujuan').html('<option value=""> [ Pilih Kota/Kabupaten ]</option>');
                } else {
                    console.log(provinsi_tujuan_id);
                    $.ajax({
                        url: '{{ url('/kota/data') }}/' + provinsi_tujuan_id,
                        type: 'JSON',
                        method: 'GET',
                        beforeSend:function() {
                            $('#kota_tujuan').html('<option value="">....</option>');
                        },
                        success:function(data){
                            var data_kota = '<option value=""> [ Pilih Kota/Kabupaten ]</option>';
                            $.each(data,function(i,e){
                                data_kota += '<option value="'+e.id+'">'+e.nama+'</option>';
                            });

                            $('#kota_tujuan').html(data_kota);
                        }
				    });
                }
			});
        });
    </script>
@endpush