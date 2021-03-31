<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tanggal_pembelian' => $this->tanggal_pembelian,
            'kode_barang' => $this->kode_barang,
            'nama_barang' => $this->nama_barang,
            'harga_barang' => $this->harga_barang,
            'qty_pembalian' => $this->qty_pembalian,
            'nama_pic' => $this->nama_pic
        ];
    }
}
