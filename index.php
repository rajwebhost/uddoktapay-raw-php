<?php
/**
 * UuddoktaPay RAW PHP Example
 *
 * Copyright (c) 2022 UuddoktaPay
 * Website: https://uddoktapay.com
 * Developer: rtrasel.com
 * 
 */


// UuddoktaPay Gateway Specific Settings
$api_url = 'https://sandbox.uddoktapay.com/api/checkout'; // Your API URL
$apiKey = '982d381360a69d419689740d9f2e26ce36fb7a50'; // Your API KEY

// Invoice Parameters
$invoiceId = 10;
$amount = 100;

// Client Parameters
$fullname = 'John Doe';
$email = 'test@example.com';


// URL Parameters
$returnUrl = 'http://localhost/success.html'; // show success message to user
$cancelUrl = 'http://localhost/cancel.html'; // show cancel message to user

$webhookUrl = 'http://localhost/webhook.php'; // We will send payment data to this url. Validate payment


// You can add more data in this array according to your project.
$metaData = [
    'invoice_id' => $invoiceId,
];


// Compiled Post from Variables
$postfields = [
    'amount' => $amount,
    'full_name' => $fullname,
    'email' => $email,
    'metadata' => $metaData,
    'redirect_url' => $returnUrl,
    'cancel_url' => $cancelUrl,
    'webhook_url' => $webhookUrl
];

// Setup request to send json via POST.
$headers = [];
$headers[] = "Content-Type: application/json";
$headers[] = "RT-UDDOKTAPAY-API-KEY: {$apiKey}";

// Contact UuddoktaPay Gateway and get URL data
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postfields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close($ch);
$result = json_decode($response, true);
$payment_url = $result['payment_url'];
header("Location: $payment_url");