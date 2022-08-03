# RAW PHP Example Code

This is a simple RAW PHP checkout example of Uddoktapay.


We have added Sandbox API KEY & Sandbox URL in this example file.

Step 1: Create Charge API v1

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


API V1 Response Example:
```bash
[ 
    ["status"]        => "true",
    ["message"]       =>  "Payment Url",
    ["payment_url"]   => "https://sandbox.uddoktapay.com/payment/2630d8541026333dd3d186eccba0604da6cb5f40" 
]
```



Step 2: Complete Payment

Step 3: Get Response & Verify Payment



API V1: You will get response in webhook url

API V2: You will get response in success url.

Enjoy
