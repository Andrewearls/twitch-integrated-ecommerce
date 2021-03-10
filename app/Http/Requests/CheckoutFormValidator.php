<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutFormValidator extends FormRequest
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
            'firstName' => 'required|alpha_num',
            'lastName' => 'required|alpha_num',
            'email' => 'required|email',
            'billing.address' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'billing.addressTwo' => 'nullable|egex:/^[a-zA-Z0-9\s]+$/',
            'billing.country' => 'required|alpha',
            'billing.state' => 'required|alpha',
            'billing.zip' => 'required|numeric',
            // 'shipping.sameAsOption' => 'required|boolean',
            'shipping.address' => 'nullable|egex:/^[a-zA-Z0-9\s]+$/',
            'shipping.addressTwo' => 'nullable|egex:/^[a-zA-Z0-9\s]+$/',
            'shipping.country' => 'nullable|alpha',
            'shipping.state' => 'nullable|alpha',
            'shipping.zip' => 'nullable|numeric',
            // 'cardName' => 'required|alpha_num',
            // 'cardNumber' => 'required|numeric',
            // 'cardExpiration' => 'required|numeric',
            // 'cardCVV' => 'required|numeric',
        ];
    }
}
