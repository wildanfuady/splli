<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\StokBarang;

class CreateStokBarangRequest extends FormRequest
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
            'barang_id' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'qty' => 'required|numeric'
        ];
        
    }

    public function messages()
    {
        return [
            'barang_id.required' => 'Barang wajib diisi.',
            'barang_id.numeric' => 'Barang wajib berupa angka.',
            'harga_jual.required' => 'Harga jual wajib diisi.',
            'harga_jual.numeric' => 'Harga jual wajib berupa angka.',
            'qty.required' => 'Jumlah barang wajib diisi.',
            'qty.numeric' => 'Jumlah barang wajib berupa angka.',
        ];
    }
}
