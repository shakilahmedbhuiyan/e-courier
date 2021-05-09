<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourierRequest extends FormRequest
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
            'from' => 'required|integer|exists:App\Branch,id',
            'to' => 'required|integer|exists:App\Branch,id|different:from',
            'delivery' => 'required|string|in:express,regular,next_day',
            'receiverName' => 'required|string',
            'receiverEmail' => 'required|email:rfc,dns',
            'receiverPhone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:13',
            'receiverAddress' => 'required|string',
            'senderName' => 'required|string',
            'senderEmail' => 'required|email:rfc,dns|different:receiverEmail',
            'senderPhone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:13|different:receiverPhone',
            'senderAddress' => 'required|string|different:receiverAddress',
            'category'=> 'required|not_in:0|exists:App\CourierCharge,category',
            'unit'=> 'numeric|between:1,99.99|nullable',
            'weight'=> 'numeric|between:0.1,20.99',
            'total'=> 'required|numeric',[ 'regex:/(^$|^\d+(,\d{1,2})?$)/' ],'min:10.00',
            'description'=> 'string|nullable'

        ];
    }
}
