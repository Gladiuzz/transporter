<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest
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
        if(request()->isMethod('PATCH')) {
            $nip = 'required|string|max:191|unique:pegawai,nip,'.request()->id;
        } else {
            $nip = 'required|string|max:191|unique:pegawai';
        }

        return [
            'nip' => $nip,
            'nama' => 'required|string|max:191',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'status_perkawinan' => 'required',
            'nomor_telepon' => 'required|numeric',
            'provinsi_id' => 'required',
            'kota_id' => 'required',
            'jabatan_id' => 'required',
            'alamat' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'nip' => __('pegawai.form_pegawai_nip_label'),
            'nama' => __('pegawai.form_pegawai_nama_label'),
            'tanggal_lahir' => __('pegawai.form_pegawai_tanggal_lahir_label'),
            'jenis_kelamin' => __('pegawai.form_pegawai_jenis_kelamin_label'),
            'status_perkawinan' => __('pegawai.form_pegawai_status_perkawinan_label'),
            'provinsi_id' => __('pegawai.form_pegawai_provinsi_id_label'),
            'kota_id' => __('pegawai.form_pegawai_kota_id_label'),
            'jabatan_id' => __('pegawai.form_pegawai_jabatan_id_label'),
            'nomor_telepon' => __('pegawai.form_pegawai_nomor_telepon_label'),
            'alamat' => __('pegawai.form_pegawai_alamat_label'),
        ];
    }
}
