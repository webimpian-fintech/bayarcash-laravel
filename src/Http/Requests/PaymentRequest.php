<?php

namespace Webimpian\BayarcashLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'payment_gateway' => 'required',
            'order_no'        => 'required|regex:/^[A-Za-z0-9@\/\\\(\)\ \.\-\_\,\`\~\*\"\;\:]+$/i|max:40',
            'order_amount'    => 'required|numeric|between:1.00,30000.00,regex:/^[0-9]*\.[0-9]{2}$/',
            'buyer_name'      => 'required|regex:/^[A-Za-z0-9@\/\\\(\)\ \.\-\_\,\&\'\`\~\*\"\;\:]+$/i',
            'buyer_email'     => 'required|email|max:50',
            'buyer_tel_no'    => 'nullable|regex:/^(6?01)[0-46-9]*[0-9]{8,9}$/',
            'return_url'      => 'nullable|url',
            'raw_website'     => 'nullable',
        ];

        return $rules;
    }
}