<?php
header('Content-Type: application/json');

$apiKey = "9f57d11554c24fb8f03a4875f513ce9f";

$trackingNumber = isset($_GET['tracking_number']) ? trim($_GET['tracking_number']) : '';

if (empty($trackingNumber)) {
    http_response_code(400);
    echo json_encode([
        "error" => "Tracking number is required",
        "generated_in" => "0ms",
        "data" => null
    ]);
    exit;
}

$url = "https://sa.api.fastway.org/latest/tracktrace/render/$trackingNumber?api_key=$apiKey";

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_HTTPHEADER => [
        'Accept: application/json'
    ],
    CURLOPT_TIMEOUT => 15
]);

$response = curl_exec($ch);
$error = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Handle the errors
if ($error) {
    http_response_code(500);
    echo json_encode([
        "error" => "API request failed: $error",
        "generated_in" => "0ms",
        "data" => null
    ]);
    exit;
}

// Handle the non-200 responses
if ($httpCode !== 200) {
    http_response_code($httpCode);
    echo $response;
    exit;
}

// Show the successful response
echo $response;
?>