<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRegisterRequest extends FormRequest
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
            'firstname'=>'required|regex:/([A-Za-z])/',
            'lastname'=>'required|regex:/([A-Za-z])/',
            'email'=>'required',
            'gender'=>'required',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'birthday'=>'required',
            'country'=>'required',
            'city'=>'required',
            'address'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'txtpassword.required'=>'The password field  is required',
        ];
    }
}
