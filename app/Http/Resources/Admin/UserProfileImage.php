<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileImage extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'profile_image' => $this->profile_image,
            'image' => $this->image,
            'image_slug' => $this->image_slug,
            'show_request_ids' => $this->show_request_ids,
            'show_approved_ids' => $this->show_approved_ids,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
