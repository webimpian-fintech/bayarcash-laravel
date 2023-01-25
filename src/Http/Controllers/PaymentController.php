<?php

namespace Webimpian\BayarcashLaravel\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Webimpian\BayarcashLaravel\Http\Requests\PaymentRequest;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;

class PaymentController
{
    /**
     * @param \Webimpian\BayarcashLaravel\Http\Requests\PaymentRequest $request
     * @return string|void
     */
    public function init(PaymentRequest $request)
    {
        $api_url = config('bayarcash-laravel.fpx_transaction_url');

        $data = $request->validated() + ['portal_key' => config('bayarcash-laravel.portal_key')];

        return view('bayarcash-laravel::init-payment', [
            'data'    => $data,
            'api_url' => $api_url
        ]);
    }

    /**
     * @return int[]
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Exception
     */
    public function requery(Request $request)
    {
        $api_url = config('bayarcash-laravel.requery_transaction_url');// . '/a';

        try {
            $client = new \GuzzleHttp\Client([
                'verify' => !app()->environment('local'),
            ]);

            $request = $client->post($api_url, [
                'headers' => [
                    'Authorization' => ['Bearers ' . config('bayarcash-laravel.bearer_token')],
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'RefNo' => $request->RefNo,
                ]
            ]);

            $statusCode = $request->getStatusCode();
            $resultBody = json_decode($request->getBody()->getContents(), true);
            $transactionsList = $resultBody['output']['transactionsList'];

            $transaction = [];

            if ($transactionsList['recordsListTotalRecordCount'] > 0) {
                $transaction = $transactionsList['recordsListData'][0];
            }

            return $transaction;
        } catch (ClientException $e) {
            return $e->getResponse()->getBody()->getContents();
        } catch (ConnectException $e) {
            return 'Connection Error';
        }
    }
}