<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomer extends FormRequest
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
            'first_name'=>'required|max:200',
            'last_name'=>'required|max:200',
            'email'=>'nullable|email|max:200|unique:customers,email',
            'phone'=>'nullable|digits:11|unique:customers,phone'
        ];
    }
}
