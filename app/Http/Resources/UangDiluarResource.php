<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UangDiluarResource extends JsonResource
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
            'nama_konsumen' => $this->nama_konsumen,
            'hp_konsumen' => $this->hp_konsumen,
            'jumlah_tagihan' => $this->jumlah_tagihan,
            'jumlah_hutang' => $this->jumlah_hutang,
            'sisa_hutang' => $this->sisa_hutang,
            'keterangan' => $this->keterangan,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
