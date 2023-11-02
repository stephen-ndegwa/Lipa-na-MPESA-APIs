<?php

// API endpoint URL
$apiUrl = "https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate";

// Replace with your actual access token
$accessToken = "Bearer <Access-Token>";

// API request data
$requestData = json_encode([
    "ShortCode" => "600986",
    "CommandID" => "CustomerPayBillOnline",
    "Amount" => "1",
    "Msisdn" => "254796006102",
    "BillRefNumber" => "TRANSFER"
]);

// Initialize cURL session
$ch = curl_init($apiUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: " . $accessToken,
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL session
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
}

// Close the cURL session
curl_close($ch);

// Handle the API response, e.g., print it
echo $response;
