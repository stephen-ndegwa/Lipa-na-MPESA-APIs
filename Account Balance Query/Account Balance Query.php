<?php
/*
Title: How to Make Account Balance Query Using Safaricom APIs
Description: This PHP code snippet demonstrates how to make an Account Balance Query using Safaricom's API. It sends a POST request to the specified endpoint with the required parameters.
*/

// API endpoint URL
$apiUrl = "https://sandbox.safaricom.co.ke/mpesa/accountbalance/v1/query";

// Replace with your actual access token
$accessToken = "Bearer <Access-Token>";

// API request data
$requestData = json_encode([
    "Initiator" => "",
    "SecurityCredential" => "",
    "CommandID" => "AccountBalance",
    "PartyA" => "",
    "IdentifierType" => "4",
    "Remarks" => "",
    "QueueTimeOutURL" => "",
    "ResultURL" => ""
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
?>
