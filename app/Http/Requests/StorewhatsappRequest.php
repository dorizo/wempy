<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorewhatsappRequest extends FormRequest
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
            'whatsappName' => 'required|string|max:250',
            'WhatsappDesc' => 'required|string|max:250',
            //
        ];
    }
}
