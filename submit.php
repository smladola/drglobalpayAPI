<?php
session_start();

$url = "https://drglobalpay.com/api/test-transaction";
$key = "63D5Rid5s205xblO6Q7R0driMXhur9KdrHzEQWk3X4H2ztTrNZMHRbJEljNhtSMMaB";

$data = [
    'api_key' => $key,
    'first_name' => 'First Name',
    'last_name' => 'Last Name',
    'address' => 'Address',
    'customer_order_id' => time(),
    'country' => 'US',
    'state' => 'NY', 
    'city' => 'New York',
    'zip' => '38564',
    'ip_address' => '127.0.0.1',
    'email' => 'your@gmail.com',
    'phone_number' => '+101234567890',
    'amount' => '10.00',
    'currency' => 'USD',
    'card_number' => '4242424242424242',
    'expiry_month' => '02',
    'expiry_year' => '2022',
    'cvv' => '123',
    'response_url' => 'http://localhost:8003redirect.php',
];

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER,[
    'Content-Type: application/json'
]);
$response = curl_exec($curl);
curl_close($curl);

$responseData = json_decode($response);

print_r($responseData);exit();

if($responseData->status == '3d_redirect') {
    header("Location: ".$responseData->redirect_3ds_url);
} elseif ($responseData->success) {
    $_SESSION["status"] = 'success';
    header("Location: index.php");
} else {
    $_SESSION["status"] = 'fail';
    header("Location: index.php");
}