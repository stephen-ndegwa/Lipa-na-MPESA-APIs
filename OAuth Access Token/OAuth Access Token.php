<?php

// Safaricom OAuth API endpoint
$apiUrl = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

// Safaricom API credentials
$username = "Your_Client_ID"; // Replace with your actual client ID
$password = "Your_Client_Secret"; // Replace with your actual client secret

// Set the cURL session
$ch = curl_init($apiUrl);

// Base64 encode the client credentials
$credentials = base64_encode($username . ':' . $password);

// Set cURL options
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Basic " . $credentials
]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL session
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
}

// Close the cURL session
curl_close($ch);

// Handle the API response
if ($response) {
    $data = json_decode($response);
    if ($data->access_token) {
        $accessToken = $data->access_token;
        echo "Access Token: $accessToken";
    } else {
        echo "Failed to obtain access token. Response: " . $response;
    }
} else {
    echo "No response from the API.";
}
