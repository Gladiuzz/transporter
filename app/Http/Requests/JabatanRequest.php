<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JabatanRequest extends FormRequest
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
            'nama' => 'required|max:191',
            'gaji_pokok' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'nama' => __('jabatan.form_jabatan_nama_label'),
            'gaji_pokok' => __('jabatan.form_jabatan_gaji_pokok_label')
        ];
    }
}
