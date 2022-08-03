<?php

require_once 'UPAPI.php';

UPAPI::init('982d381360a69d419689740d9f2e26ce36fb7a50', 'https://sandbox.uddoktapay.com/api/checkout-v2');

// API V1 = https://sandbox.uddoktapay.com/api/checkout
// API V2 = https://sandbox.uddoktapay.com/api/checkout-v2

$data = [
    'amount' => '100',
    'full_name' => 'John Doe',
    'email' => 'test@test.com',
    'metadata' => [
        'order_id' => 10
    ],
    'redirect_url' => 'http://localhost/success.php',
    'cancel_url' => 'http://localhost/cancel.php',
    'webhook_url' => 'http://localhost/webhook.php',
];

$response = UPAPI::create_payment($data);

var_dump($response);