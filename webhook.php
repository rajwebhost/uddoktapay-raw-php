<?php

require_once 'UPAPI.php';

UPAPI::init('982d381360a69d419689740d9f2e26ce36fb7a50', 'https://sandbox.uddoktapay.com/api/checkout');

$data = UPAPI::execute_payment();

// Here We just log data for tesing...
file_put_contents("response.txt", json_encode($data));
