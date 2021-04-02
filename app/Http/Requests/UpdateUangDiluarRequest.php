<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\UangDiluar;

class UpdateUangDiluarRequest extends FormRequest
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
            'nama_konsumen' => 'required|string',
            'hp_konsumen' => 'required|numeric',
            'jumlah_tagihan' => 'required|numeric',
            'jumlah_hutang' => 'required|numeric',
            'sisa_hutang' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'nama_konsumen.required' => 'Nama konsumen wajib diisi.',
            'nama_konsumen.string' => 'Nama konsumen wajib berupa string.',
            'hp_konsumen.required' => 'Nomor HP konsumen wajib diisi.',
            'hp_konsumen.numeric' => 'Nomor HP konsumen wajib berupa angka.',
            'jumlah_tagihan.required' => 'Jumlah tagihan wajib diisi.',
            'jumlah_tagihan.numeric' => 'Jumlah tagihan wajib berupa angka.',
            'jumlah_hutang.required' => 'Jumlah hutang wajib diisi.',
            'jumlah_hutang.numeric' => 'Jumlah hutang wajib berupa angka.',
            'sisa_hutang.required' => 'Sisa hutang wajib diisi.',
            'sisa_hutang.numeric' => 'Sisa hutang wajib berupa angka.',
        ];
    }
}
