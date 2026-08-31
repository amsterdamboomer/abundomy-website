<?php
// proxy.php
header('Content-Type: application/json');

if (!isset($_POST['text']) || !isset($_POST['to'])) {
    echo json_encode(["error" => "Missing POST data."]);
    exit;
}

$to = $_POST['to'];
$text = $_POST['text'];

// Free Google API endpoint
$baseUrl = "https://translate.googleapis.com/translate_a/single";
$params = [
    'client' => 'gtx',
    'sl' => 'en',
    'tl' => $to,
    'dt' => 't',
    'q' => $text
];

$url = $baseUrl . '?' . http_build_query($params);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');

$response = curl_exec($ch);
curl_close($ch);

if (!$response) {
    echo json_encode(["error" => "Network error: Connection failed."]);
    exit;
}

$data = json_decode($response, true);
$translatedString = "";

// RECURSIVE PARSING: Google returns segments in data[0][i][0]
if (isset($data[0]) && is_array($data[0])) {
    foreach ($data[0] as $segment) {
        if (isset($segment[0])) {
            $translatedString .= $segment[0];
        }
    }
}

if (empty($translatedString)) {
    echo json_encode(["error" => "Empty result from Google", "debug_raw" => $response]);
} else {
    echo json_encode(["translated" => $translatedString]);
}
