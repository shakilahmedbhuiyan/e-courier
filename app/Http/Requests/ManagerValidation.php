<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagerValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:App\Employee,id',
            'branch' => 'required|integer|exists:App\Branch,id',
            'date' => 'required|date|after:today'
        ];
    }

    public function messages(): array
    {
       return [
           'branch.required' => 'No Branch Selected !',
           'branch.integer' => 'Something went wrong !',
           'branch.exists' => 'Something went wrong! Try again',
           'id.required' => 'No employee Found! Try again',
           'id.integer' => 'Something went wrong with employee ID',
           'id.exists' => 'Something went wrong with employee ID! Try again',
       ];
    }
}
