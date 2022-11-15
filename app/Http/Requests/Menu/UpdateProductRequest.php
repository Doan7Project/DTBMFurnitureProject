<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'txtProductName' => 'required',
            'txtUnit' => 'required|regex:/([A-Za-z])/',
            'txtPrice' => 'required',
            'txtQuantity' => 'required',
            'txtImage' => 'required',
            'txtContent' => 'required',
            'txtMadein' => 'required',
            'txtDescription' => 'required',
            
        ];
    }
    public function messages()
    {
       return [
        'txtCategoryID.required'=>'Category is required',
        'txtProductName.required'=>'Product name is required',
        'txtProductName.unique'=>'Product name has already taken',
        'txtPrice.required' => 'Price is required',
        'txtUnit.required'=>'Unit is required',   
        'txtUnit.regex'=>'Unit is not format', 
        'txtQuantity.required' => 'Qty is required',  
        'txtContent.required' => 'Content is required',  
        'txtDescription.required' => 'Description is required',       
       ];
    }
}
