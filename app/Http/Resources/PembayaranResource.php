<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PembayaranResource extends JsonResource
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
            'id_po' => $this->id_po,
            'tanggal' => $this->tanggal,
            'plat_motor' => $this->plat_motor,
            'nama_konsumen' => $this->nama_konsumen,
            'nama_sparepart' => $this->nama_sparepart,
            'harga_grosir' => $this->harga_grosir,
            'harga_jual' => $this->harga_jual,
            'qty' => $this->qty,
            'harga_pasang' => $this->harga_pasang,
            'jasa_service' => $this->jasa_service,
            'total_harga' => $this->total_harga,
            'selisih' => $this->selisih,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
