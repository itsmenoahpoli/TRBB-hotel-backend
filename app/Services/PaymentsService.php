<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PaymentsService
{
    private $paymongoBaseUrl = 'https://api.paymongo.com/v1/links';
    private $defaultHeaders = [
        'accept'        => 'application/json',
        'content-type'  => 'application/json',
        'authorization' => 'Basic '.$this->_headerAuthToken()
    ];

    private function _headerAuthToken() {
        $publicKey = env('PAYMONGO_PUBLIC_KEY');
        $secretKey = env('PAYMONGO_SECRET_KEY');

        return base64_encode($secretKey.':'.$publicKey);
    }

    public function createPayment($amount, $description = '', $remarks = '')
    {
        $formattedAmmount = intval($amount.'00');

        $response = Http::withHeaders($this->defaultHeaders)->post(
            $this->paymongoBaseUrl,
            [
                'data' => [
                    'attributes' => [
                        'amount'        => $formattedAmmount,
                        'description'   => $description,
                        'remarks'       => $remarks
                    ]
                ]
            ]
        );

        return json_decode($response->body());
    }
}
