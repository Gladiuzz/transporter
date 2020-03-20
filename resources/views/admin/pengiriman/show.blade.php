@extends('admin.layouts.app')

@section('title', 'Detail Pengiriman')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('pengiriman.title_detail')
            <small>@lang('pengiriman.title_index')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">@lang('pengiriman.title')</a></li>
            <li class="active">@lang('pengiriman.title_index')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-xs-12">
                <a href="{{ route('pengiriman.index') }}" class="btn btn-success"><i class="fa fa-chevron-left"></i> @lang('global.btn_back')</a>
                <br>
                <br>
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Data Pengiriman</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <tr>
                                <th width="300px">Nomor Invoice</th>
                                <td width="30px">:</td>
                                <td>{{ $pengiriman->nomor_invoice }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengiriman</th>
                                <td>:</td>
                                <td>{{ $pengiriman->tanggal->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th>Tujuan</th>
                                <td>:</td>
                                <td>{{ $pengiriman->kotaTujuan->nama }}</td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Penerima</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <tr>
                                <th width="300px">Nama Perusahaan</th>
                                <td width="20px">:</td>
                                <td>{{ $pengiriman->perusahaan_asal }}</td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>:</td>
                                <td>{{ $pengiriman->provinsiAsal->nama }}</td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td>:</td>
                                <td>{{ $pengiriman->kotaAsal->nama }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Lengkap</th>
                                <td>:</td>
                                <td>{{ $pengiriman->alamat_asal }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td>:</td>
                                <td>{{ $pengiriman->nomor_telepon_asal }}</td>
                            </tr>
                            <tr>
                                <th>Kode Pos</th>
                                <td>:</td>
                                <td>{{ $pengiriman->kode_pos_asal }}</td>
                            </tr>
                            <tr>
                                <th>Negara</th>
                                <td>:</td>
                                <td>{{ $pengiriman->negara_asal }}</td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Pengirim</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <tr>
                                <th width="300px">Nama Perusahaan</th>
                                <td width="20px">:</td>
                                <td>{{ $pengiriman->perusahaan_tujuan }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>{{ $pengiriman->alamat_tujuan }}</td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>:</td>
                                <td>{{ $pengiriman->provinsiTujuan->nama }}</td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td>:</td>
                                <td>{{ $pengiriman->kotaTujuan->nama }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td>:</td>
                                <td>{{ $pengiriman->nomor_telepon_tujuan }}</td>
                            </tr>
                            <tr>
                                <th>Kode Pos</th>
                                <td>:</td>
                                <td>{{ $pengiriman->kode_pos_tujuan }}</td>
                            </tr>
                            <tr>
                                <th>Negara</th>
                                <td>:</td>
                                <td>{{ $pengiriman->negara_tujuan }}</td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Barang</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <tr>
                                <th width="300px">Jenis Paket</th>
                                <td width="20px">:</td>
                                <td>{{ $pengiriman->paket == 0 ? 'Reguler' : 'Express' }}</td>
                            </tr>
                            <tr>
                                <th>Via</th>
                                <td>:</td>
                                <td>
                                    @if($pengiriman->jalur == 0)
                                        Udara
                                    @elseif($pengiriman->jalur == 1)
                                        Darat
                                    @else
                                        Laut
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Jenis Barang</th>
                                <td>:</td>
                                <td>{{ $pengiriman->jenis_barang }}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>:</td>
                                <td>Rp. {{ number_format($pengiriman->harga,2,",",".") }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Perhitungan</th>
                                <td>:</td>
                                <td><label class="label label-success">{{ $pengiriman->jenis_berat == 0 ? 'Berdasarkan Berat' : 'Berdasarkan Volume'}}</label></td>
                            </tr>
                            @if($pengiriman->jenis_berat == 0)
                                <tr>
                                    <th>Berat (KG)</th>
                                    <td>:</td>
                                    <td>{{ $pengiriman->berat }}</td>
                                </tr>
                            @else
                                <tr>
                                    <th>Panjang (CM)</th>
                                    <td>:</td>
                                    <td>{{ $pengiriman->panjang }}</td>
                                </tr>
                                <tr>
                                    <th>Lebar (CM)</th>
                                    <td>:</td>
                                    <td>{{ $pengiriman->lebar }}</td>
                                </tr>
                                <tr>
                                    <th>Tinggi (CM)</th>
                                    <td>:</td>
                                    <td>{{ $pengiriman->tinggi }}</td>
                                </tr>
                                <tr>
                                    <th>Volume (KG)</th>
                                    <td>:</td>
                                    <td>{{ $pengiriman->berat }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th>Koli</th>
                                <td>:</td>
                                <td>{{ $pengiriman->koli }}</td>
                            </tr>
                            <tr>
                                <th>Asuransi</th>
                                <td>:</td>
                                <td>Rp. {{ number_format($pengiriman->asuransi,2,",",".") }}</td>
                            </tr>
                            <tr>
                                <th>Subcharge</th>
                                <td>:</td>
                                <td>{{ $pengiriman->sub_charge }} %</td>
                            </tr>
                            <tr>
                                <th>Ongkos Kirim</th>
                                <td>:</td>
                                <td>Rp. {{ number_format($pengiriman->ongkos_kirim,2,",",".") }}</td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
@endsection