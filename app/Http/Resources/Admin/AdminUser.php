<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Role as RoleResource;
use App\Http\Resources\Admin\Warehouse as WarehouseResource;

use App\Http\Resources\Admin\PermissionRole as PermissionRoleResource;
use App\Models\Admin\PermissionRole;

class AdminUser extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'gender' => $this->gender,
            'marital_status' => $this->marital_status,
            'profession' => $this->profession,
            'country' => $this->country,
            'district' => $this->district,
            'birthday' => $this->birthday,
            'guardian_mobile' => $this->guardian_mobile,
            'createdby' => $this->createdby,
            'religion' => $this->religion,
            'social_order' => $this->social_order,
            'looking_for' => $this->looking_for,
            'address' => $this->address,
            'activation' => $this->activation,
            'status' => $this->status,
            'role' => new RoleResource($this->role),
            // 'warehouse' => Warehouse::collection($this->warehouses)

        ];
    }
}
