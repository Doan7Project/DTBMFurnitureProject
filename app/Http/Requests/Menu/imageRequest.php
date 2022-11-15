<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class imageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'txtProductID' =>'required',
            'txtImage' =>'required',
            'txtContent' =>'required'
        ];
    }

    public function messages()
    {
        return [
            //
            'txtProductID.required' =>'The product Name is required',
            'txtImage.required' =>'The image  is required',
            'txtContent.required' =>'The Content  is required'
        ];
    }
}
