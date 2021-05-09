<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * @var mixed
     */
    private $email, $password, $name, $phone, $address, $branch_id, $verification_code;

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
            'branch' => 'required|not_in:0',
            'email' => 'required|email:rfc,dns|unique:App\Employee,email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:13|unique:App\Employee,phone',
            'address' => 'required',
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
            'name.required' => 'Employee can not be without a name!',
            'phone.regex' => 'Not a valid phone number',
            'phone.min' => 'Enter 11 digits phone number',
            'phone.max' => 'Phone number can not exceed 13 digits!',
            'phone.unique' => 'Phone number already exists!',
            'email.required' => 'E-mail is must',
            'email.email' => 'Not a valid email address',
            'email.unique' => 'Email address already exists!',
            'branch.required' => 'Ohh! You not assigned this person to any branch.',
            'address.required' => 'Really! This person do not have any address?',
        ];
    }
}
