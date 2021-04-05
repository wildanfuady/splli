<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Pembayaran;

class UpdatePembayaranRequest extends FormRequest
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
            'id_po' => 'required|string',
            'tanggal' => 'required|string',
            'plat_motor' => 'required|string',
            'nama_konsumen' => 'required|string',
            'barang_id' => 'required|numeric',
            'harga_grosir' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'qty' => 'required|numeric',
            'harga_pasang' => 'required|numeric',
            'jasa_service' => 'required|numeric',
            'total_harga' => 'required|numeric',
            'selisih' => 'required|numeric',
        ];
    }
}
