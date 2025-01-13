<?php
namespace Miniorange\Phpoauth\Network;

function makeApiCall(string $url, array $headers, array $params = [], string $requestType = 'POST'): array
{
    $ch = curl_init($url);

    // Common cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // Set headers

    // Configure for POST or GET request
    if (strtoupper($requestType) === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params)); // Encode parameters for POST
    } elseif (strtoupper($requestType) === 'GET') {
        if (!empty($params)) {
            $url .= '?' . http_build_query($params); // Append query params for GET
            curl_setopt($ch, CURLOPT_URL, $url); // Update URL with params
        }
    } else {
        throw new \InvalidArgumentException('Unsupported request type: ' . $requestType);
    }

    // Optional: Disable SSL checks (only for development)
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute the API call
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        throw new \Exception('CURL Error: ' . curl_error($ch));
    }

    // Close the cURL session
    curl_close($ch);

    // Decode the response (assuming it's JSON)
    $decodedResponse = json_decode($response, true);

    // Check for JSON decoding errors
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new \Exception('JSON Decode Error: ' . json_last_error_msg());
    }
    return $decodedResponse;
}
