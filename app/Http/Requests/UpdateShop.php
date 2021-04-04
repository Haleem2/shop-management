<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShop extends FormRequest
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
            'name'=>'required|max:200',
            'email'=>'nullable|email|unique:shops,email,'.$this->shop->id,
            'website'=>'nullable|max:200',
            'logo'=>'nullable|mimes:jpg,jpeg,png,bmp,tiff|dimensions:min_width=100,min_height=100|max:1024'
        ];
    }
}
