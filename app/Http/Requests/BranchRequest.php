<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email:rfc,dns|unique:App\Branch,email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:13|unique:App\Branch,phone'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Must named the branch!',
            'phone.regex' => 'Not a valid phone number',
            'phone.min' => 'Enter 11 digits phone number',
            'phone.max' => 'Phone number can not exceed 13 digits!',
            'phone.unique' => 'Phone number already exists!',
            'email.required' => 'E-mail is must',
            'email.email' => 'Not a valid email address',
            'email.unique' => 'Email address already exists!',
            'address.required' => 'Branch must have a address!'
        ];
    }
}
