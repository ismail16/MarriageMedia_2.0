<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackagePriceUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'duration' => 'required',
            'proposal' => 'required',
            'contact' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required',
        ];
    }
}
