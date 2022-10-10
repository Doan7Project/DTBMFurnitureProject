<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormProductRequest extends FormRequest
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
            'txtCategoryID' => 'required',
            'txtProductCode' => 'required|min:4|max:10|',
            'txtProductName' => 'required',
            'txtUnit' => 'regex:/([A-Za-z])/',
        ];
    }
    public function messages()
    {
       return [
        'txtCategoryID.required'=>'Category is required',
        'txtProductCode.required'=>'Product code is required',
        'txtProductName.required'=>'Product name is required',
        'txtUnit.regex'=>'Field is not format',        
       ];
    }
}