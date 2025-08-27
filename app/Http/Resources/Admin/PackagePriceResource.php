<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackagePriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
            [
                'id' => $this->id,
                'title' => $this->title,
                'price' => $this->price,
                'discount' => $this->discount,
                'duration' => $this->duration,
                'proposal' => $this->proposal,
                'contact' => $this->contact,
                'image' => $this->image,
                'status' => $this->status,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ];
    }
}
