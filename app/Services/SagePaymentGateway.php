<?php

namespace App\Services;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class SagePaymentGateway
{
    protected $client;
    protected $vendorName;
    protected $integrationKey;
    protected $integrationPassword;
    protected $merchantKey;

    public function __construct()
    {
        $this->client = new Client;
        $this->vendorName = config('sagepay.vendor_name');
        $this->integrationKey = config('sagepay.integration_key');
        $this->integrationPassword = config('sagepay.integration_password');
    }

    ////////////////////////////////////////////////
    ///
    ///     AUTHORIZATION
    ///
    ////////////////////////////////////////////////

    /**
     * Create bearer token for authentication
     *
     * @return string
     */
    public function authenticate()
    {
        return base64_encode($this->integrationKey . ":" . $this->integrationPassword);
    }


    /**
     * Hit API to generate merchant session key
     *
     * @return String
     */
    public function getMerchantKey()
    {
        $response = $this->client->request('POST', 'https://pi-test.sagepay.com/api/v1/merchant-session-keys/', [
            'headers' => [
                'Authorization'     => 'Basic ' . $this->authenticate(),
                'Accept'     => 'application/json',
                'Content-Type'     => 'application/json',
            ],
            'json' => [
                'vendorName' => $this->vendorName
            ]
        ]);


        $this->merchantKey = $this->getResponse($response)->merchantSessionKey;
    }


    /**
     * Save card and generate identifier to store against user
     *
     * @return mixed
     */
    public function generateCardIdentifier($cardName, $cardNumber, $expiryDate, $securityCode)
    {
        $response = $this->client->request('POST', 'https://pi-test.sagepay.com/api/v1/card-identifiers/', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->merchantKey
            ],
            'json' => [
                'cardDetails' => [
                    'cardholderName' => $cardName,
                    'cardNumber' => $cardNumber,
                    'expiryDate' => $expiryDate,
                    'securityCode' => $securityCode
                ]
            ]
        ]);

        return $this->getResponse($response)->cardIdentifier;

    }


    /**
     * Process a single transaction
     *
     */
    public function processTransaction($user, $card_details, $billing, $shipping, $course)
    {
        $this->getMerchantKey();
        $response = $this->client->request('POST', 'https://pi-test.sagepay.com/api/v1/transactions', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . $this->authenticate()
            ],
            'json' => [
                'paymentMethod' => [
                    'card' => [
                        'merchantSessionKey' => $this->merchantKey,
                        'cardIdentifier' => $this->generateCardIdentifier($card_details['card_name'], $card_details['card_number'], $card_details['expiry_date'], $card_details['security_code']),
                    ]
                ],
                'transactionType' => 'Payment',
                'vendorTxCode' => Str::random(32),
                'amount' => $course['retail_price'],
                'currency' => 'GBP',
                'customerFirstName' => $user['first_name'],
                'customerLastName' => $user['last_name'],
                'billingAddress' =>[
                    'address1' => $billing['address_line_one'],
                    'city' => $billing['city'],
                    'postalCode' => $billing['postcode'],
                    'country' => $billing['country']
                ],
                'entryMethod' => 'Ecommerce',
                'apply3DSecure' => 'Disable',
                'applyAvsCvcCheck' => 'Disable',
                'description' => $user['first_name'] . ' ' . $user['last_name'] . ' paid for course ' . $course->title,
                'customerEmail' => $user['email'],
                'customerPhone' => $user['phone_number'],
                'shippingDetails' =>[
                    'recipientFirstName' => $user['first_name'],
                    'recipientLastName' => $user['last_name'],
                    'shippingAddress1' => $shipping['address_line_one'],
                    'shippingCity' => $shipping['city'],
                    'shippingPostalCode' => $shipping['postcode'],
                    'shippingCountry' => 'GB'
                ]
            ]
        ]);

        return $this->getResponse($response);
    }



    public function getResponse($response)
    {
        return json_decode($response->getBody()->getContents());
    }

}
