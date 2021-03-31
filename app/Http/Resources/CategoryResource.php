<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'categories_id' => $this->categories_id,
            'categories_image' => $this->categories_image,
            'categories_image_path' => $this->categories_image_path,
            'categories_icon' => $this->categories_icon,
            'categories_icon_path' => $this->categories_icon_path,
            'parent_id' => $this->parent_id,
            'vendors_id' => $this->vendors_id,
            'manufacturers_id' => $this->manufacturers_id,
            'sort_order' => $this->sort_order,
            'date_added' => $this->date_added,
            'last_modified' => $this->last_modified,
            'categories_slug' => $this->categories_slug,
            'categories_status' => $this->categories_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
