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
            'buyer_name'      => 'required',
            'buyer_tel_no'    => 'nullable|regex:/^(601)[0-46-9]*[0-9]{8,9}$/',
            'buyer_email'     => ['required', 'email'],
            'order_no'        => 'required',
            'order_amount'    => 'required|numeric|min:1',
            'raw_website'     => 'nullable',
            'payment_gateway' => 'required',
        ];

        return $rules;
    }
}