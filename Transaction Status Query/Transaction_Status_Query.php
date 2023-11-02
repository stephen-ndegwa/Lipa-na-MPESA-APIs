<?php
/**
 * Transaction Status Query API Example
 *
 * This section demonstrates how to make a Transaction Status Query request using the Safaricom M-Pesa API.
 *
 * @link https://developer.safaricom.co.ke/docs#transaction-status-query
 */

// API endpoint URL
$apiUrl = "https://sandbox.safaricom.co.ke/mpesa/transactionstatus/v1/query";

// Replace with your actual access token
$accessToken = "Bearer <Access-Token>";

// API request data for Transaction Status Query
$requestData = json_encode([
    "Initiator" => "",
    "SecurityCredential" => "",
    "CommandID" => "TransactionStatusQuery",
    "TransactionID" => "",
    "PartyA" => "",
    "IdentifierType" => "",
    "ResultURL" => "",
    "QueueTimeOutURL" => "",
    "Remarks" => "",
    "Occasion" => ""
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
