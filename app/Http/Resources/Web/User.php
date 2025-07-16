<?php

namespace App\Http\Resources\Web;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Web\CustomerAddressBook as CustomerAddressBookResource;

class User extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'uid' => $this->uid,
            'package_price_id' => $this->package_price_id,
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
            'agreement' => $this->agreement,
            'activation' => $this->activation,
            'status' => $this->status
        ];
    }
}
