<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storemember_katsRequest extends FormRequest
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
            'memberkatName' => 'required|string|max:250',
            'memberkatdesc' => 'required|',
        ];
    }
}
