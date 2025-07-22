<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserUpdateRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email|required|unique:admins,email,' . $this->id,
            'mobile' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'profession' => 'required',
            'country' => 'required',
            'district' => 'required',
            'birthday' => 'required',
            'religion' => 'required',
            'role_id' => 'required|exists:roles,id',
        ];
    }
}
