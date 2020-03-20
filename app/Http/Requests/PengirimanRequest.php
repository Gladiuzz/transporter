<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengirimanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tanggal' => 'required',
            'perusahaan_asal' => 'required|max:191',
            'alamat_asal' => 'required',
            'kota_asal_id' => 'required',
            'provinsi_asal_id' => 'required',
            'nomor_telepon_asal' => 'required|max:191',
            'kode_pos_asal' => 'required|max:191',
            'negara_asal' => 'required|max:191',

            'perusahaan_tujuan' => 'required|max:191',
            'alamat_tujuan' => 'required',
            'kota_tujuan_id' => 'required',
            'provinsi_tujuan_id' => 'required',
            'nomor_telepon_tujuan' => 'required|max:191',
            'kode_pos_tujuan' => 'required|max:191',
            'negara_tujuan' => 'required|max:191',

            'jalur' => 'required',
            'paket' => 'required',
            'jenis_barang' => 'required',
            'harga' => 'required',

            'jenis_berat' => 'required',

            'panjang' => 'required_if:jenis_berat,1',
            'lebar' => 'required_if:jenis_berat,1',
            'tinggi' => 'required_if:jenis_berat,1',

            'berat' => 'required_if:jenis_berat,0',

            'asuransi' => 'required',
            'koli' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'tanggal' =>  __('pengiriman.form_pengiriman_tanggal_label'),
            'perusahaan_asal' =>  __('pengiriman.form_pengiriman_perusahaan_asal_label'), 
            'alamat_asal' =>  __('pengiriman.form_pengiriman_alamat_asal_label'),
            'kota_asal_id' =>  __('pengiriman.form_pengiriman_kota_asal_id_label'),
            'provinsi_asal_id' =>  __('pengiriman.form_pengiriman_provinsi_asal_id_label'),
            'nomor_telepon_asal' =>  __('pengiriman.form_pengiriman_nomor_telepon_asal_label'),
            'kode_pos_asal' =>  __('pengiriman.form_pengiriman_kode_pos_asal_label'),
            'negara_asal' =>   __('pengiriman.form_pengiriman_negara_asal_label'),

            'perusahaan_tujuan' =>  __('pengiriman.form_pengiriman_perusahaan_tujuan_label'),
            'alamat_tujuan' =>  __('pengiriman.form_pengiriman_alamat_tujuan_label'),
            'kota_tujuan_id' =>  __('pengiriman.form_pengiriman_kota_tujuan_id_label'),
            'provinsi_tujuan_id' =>  __('pengiriman.form_pengiriman_provinsi_tujuan_id_label'),
            'nomor_telepon_tujuan' =>  __('pengiriman.form_pengiriman_nomor_telepon_tujuan_label'),
            'kode_pos_tujuan' =>  __('pengiriman.form_pengiriman_kode_pos_tujuan_label'),
            'negara_tujuan' =>  __('pengiriman.form_pengiriman_negara_tujuan_label'),

            'jalur' =>  __('pengiriman.form_pengiriman_jalur_label'),
            'paket' =>  __('pengiriman.form_pengiriman_paket_label'),
            'jenis_barang' =>  __('pengiriman.form_pengiriman_jenis_barang_label'),
            'harga' =>  __('pengiriman.form_pengiriman_harga_label'),

            'berat' =>  __('pengiriman.form_pengiriman_berat_label'),

            'panjang' =>  __('pengiriman.form_pengiriman_panjang_label'),
            'lebar' =>  __('pengiriman.form_pengiriman_lebar_label'),
            'tinggi' =>  __('pengiriman.form_pengiriman_tinggi_label'),

            'asuransi' =>  __('pengiriman.form_pengiriman_asuransi_label'),
            'koli' =>  __('pengiriman.form_pengiriman_koli_label'),
        ];
    }
}
