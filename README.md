# RAW PHP Example Code

This is a simple RAW PHP checkout example of Uddoktapay.


We have added Sandbox API KEY & Sandbox URL in this example file.

# API V1

## Step 1: Create Charge API v1

```bash
UPAPI::init('982d381360a69d419689740d9f2e26ce36fb7a50', 'https://sandbox.uddoktapay.com/api/checkout');

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

```


## API V1 Response Example:

```bash
[ 
    ["status"]          => "true",
    ["message"]         =>  "Payment Url",
    ["payment_url"]     => "https://sandbox.uddoktapay.com/payment/2630d8541026333dd3d186eccba0604da6cb5f40" 
]
```


## Step 2: Complete Payment

## Step 3: Get Response & Verify Payment

```bash
UPAPI::init('982d381360a69d419689740d9f2e26ce36fb7a50', 'https://sandbox.uddoktapay.com/api/checkout');

$data = UPAPI::execute_payment();
```

## API V1 Webhook Response Example:
```bash
{"full_name":"John Doe","email":"someone@gmail.com","amount":"50","invoice_id":"up123rt","metadata":{"invoice_id":"10"},"payment_method":"bkash","sender_number":"123456789","transaction_id":"azusd346","status":"COMPLETED"}
```



Enjoy
