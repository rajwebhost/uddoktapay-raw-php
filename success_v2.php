<?php

require_once 'UPAPI.php';

UPAPI::init('982d381360a69d419689740d9f2e26ce36fb7a50', 'https://sandbox.uddoktapay.com/api/checkout-v2');

$data = UPAPI::execute_payment_v2();

var_dump($data);
