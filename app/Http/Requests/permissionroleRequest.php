<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class permissionroleRequest extends FormRequest
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
            //
            'role_RoleCode' => 'required|unique:permission_role,role_RoleCode,NULL,permission_role,permission_permissionCode,'.request("permission_permissionCode"),
            'permission_permissionCode' => 'required',
        ];
    }
}
