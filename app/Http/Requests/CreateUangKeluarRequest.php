<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\UangKeluar;

class CreateUangKeluarRequest extends FormRequest
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
            'tanggal' => 'required|string',
            'qty' => 'required|numeric',
            'harga' => 'required|numeric',
            'total_harga' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'tanggal.required' => 'Tanggal wajib diisi.',
            'tanggal.string' => 'Tanggal wajib berupa string.',
            'qty.required' => 'Quantity wajib diisi.',
            'qty.numeric' => 'Quantity wajib berupa angka.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga wajib berupa angka.',
            'total_harga.required' => 'Total harga wajib diisi.',
            'total_harga.numeric' => 'Total harga wajib berupa angka.',
        ];
    }
}
