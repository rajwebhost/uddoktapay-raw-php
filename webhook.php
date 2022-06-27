<?php

/**
 * UuddoktaPay RAW PHP Example
 *
 * Copyright (c) 2022 UuddoktaPay
 * Website: https://uddoktapay.com
 * Developer: rtrasel.com
 * 
 */



// Response data
$payload = file_get_contents('php://input');

if (!empty($payload)) {

    // Decode response data
    $data = json_decode($payload, true);

    // Retrieve data returned in payload
    $success = true;

    $apiKey = '982d381360a69d419689740d9f2e26ce36fb7a50'; // Your Api Key 

    $signature = trim($_SERVER['HTTP_RT_UDDOKTAPAY_API_KEY']);

    if ($apiKey !== $signature) {
        $success = false;
    }

    // PENDING = TRX Not found, INVALID = User Paid lower amount,  COMPLETED = Success
    $transactionStatus = $data['status']; // PENDING or INVALID or COMPLETED
    $invoiceId = $data['metadata']['invoice_id']; // Your defined data
    $transactionId = $data['transaction_id']; // Bkash/Nagad/Rocket Transaction ID
    $paymentAmount = $data['amount']; // Product Amount
    $senderNumber = $data['sender_number'];  // Sender Number
    $paymentAmount = $data['amount']; // Product Amount
    $fullName = $data['full_name']; // Full Name
    $email = $data['email']; // Full Name

    if ('COMPLETED' !== trim($transactionStatus)) {
        $success = false;
    }


    if ($success) {
        
        // Write code as your wish. You will get all data on $data variable.
        
        // Here We just log data for tesing...
        file_put_contents("response.txt", json_encode($data));
    }
}
