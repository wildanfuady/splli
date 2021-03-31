<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HasilUsahaResource extends JsonResource
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
            'pembayaran_id' => $this->pembayaran_id,
            'uang_keluar_id' => $this->uang_keluar_id,
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan,
            'total_saldo' => $this->total_saldo,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
