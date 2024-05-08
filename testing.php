<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize cURL
$curl = curl_init();

// Construct the URL with parameters
$url = 'https://abrons.com.ng/api/data?token=f988484fc6b988d51fc4bcb23add55d865d7d68ea7203&network=MTN&plan_code=500&mobile=09067446728&request_id=REF-UNIQUE72300674352';

// Set cURL options
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
));

// Execute cURL request
$response = curl_exec($curl);

// Check for cURL errors
if ($response === false) {
    echo 'cURL error: ' . curl_error($curl) . "\n";
    echo 'cURL error code: ' . curl_errno($curl) . "\n";
} else {
    echo $response;
}

// Close cURL handle
curl_close($curl);
