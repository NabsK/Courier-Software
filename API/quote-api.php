<?php
header('Content-Type: application/json');

$apiKey = "9f57d11554c24fb8f03a4875f513ce9f";
$rfCode = "JNB"; 

$requiredParams = ['pickfranchise', 'suburb', 'postcode', 'weight'];
foreach ($requiredParams as $param) {
    if (!isset($_GET[$param]) || empty(trim($_GET[$param]))) {
        http_response_code(400);
        echo json_encode([
            "error" => "Missing or empty required parameter: $param",
            "generated_in" => "0ms",
            "data" => null
        ]);
        exit;
    }
}


$pickfranchise = urlencode(trim($_GET['pickfranchise']));
$suburb = urlencode(trim($_GET['suburb']));
$postcode = urlencode(trim($_GET['postcode']));
$weight = max(0.1, (float)$_GET['weight']); // Minimum weight 0.1kg

$url = "https://sa.api.fastway.org/latest/psc/lookup/{$pickfranchise}/{$suburb}/{$postcode}/{$weight}?api_key={$apiKey}&RFCode={$rfCode}";

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false, 
    CURLOPT_TIMEOUT => 15,
    CURLOPT_HTTPHEADER => ['Accept: application/json']
]);

$response = curl_exec($ch);
$error = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Error handling
if ($error) {
    http_response_code(500);
    echo json_encode([
        "error" => "API connection failed: " . htmlspecialchars($error),
        "generated_in" => "0ms",
        "data" => null
    ]);
    exit;
}

// Parsing the API response
$data = json_decode($response, true);

// Handle "no services" situation
if (!isset($data['result']['services']) || count($data['result']['services']) === 0) {
    http_response_code(404);
    echo json_encode([
        "error" => "No shipping services available for this destination",
        "generated_in" => $data['generated_in'] ?? "0ms",
        "data" => [
            "rf_code" => $rfCode
        ]
    ]);
    exit;
}

// Successful response
echo $response;
?>