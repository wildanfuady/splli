<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UangKeluarResource extends JsonResource
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
            'tanggal' => $this->tanggal,
            'qty' => $this->qty,
            'harga' => $this->harga,
            'total_harga' => $this->total_harga
        ];
    }
}
