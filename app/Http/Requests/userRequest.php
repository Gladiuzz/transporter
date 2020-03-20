<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'name' => __('pegawai.form_pegawai_name_label'),
            'email' => __('pegawai.form_pegawai_email_label'),
            'password' => __('pegawai.form_pegawai_password_label'),
        ];
    }
}
