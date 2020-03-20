<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KasKecilRequest extends FormRequest
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
            'tanggal' => 'required|date',
            'keterangan' => 'required|max:191'
        ];
    }

    public function attributes()
    {
        return [
            'tanggal' => __('kas_kecil.form_kas_kecil_tanggal_label'),
            'keterangan' => __('kas_kecil.form_kas_kecil_keterangan_label'),
        ];
    }
}
