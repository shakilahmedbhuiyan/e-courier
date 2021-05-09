<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagerLogin extends FormRequest
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
            'email' => 'required|email|exists:App\Employee,email',
            'password' => 'required|string|min:6|max:21',
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'You must have to enter password !',
            'password.max' => 'Maximum 21 characters allowed',
            'password.min' => 'password must be at least 6 characters',
            'email.required' => 'E-mail is must',
            'email.email' => 'Not a valid email address',
            'email.exists' => 'No user found with that email address !',
        ];
    }
}
