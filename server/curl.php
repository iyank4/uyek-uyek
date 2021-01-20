<?php
require_once ('_inc.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(404);
  die();
}

$time_start = microtime(true);
// $url = $_POST['url']; // 'https://lokadata.id';

// handle json body
$json = file_get_contents('php://input');
$data = json_decode($json);

$url = $data->url;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

header('Content-Type: application/json');
echo json_encode([
  'url' => $url,
  'time' => number_format(microtime(true) - $time_start, 2) . ' detik',
  'output' => $output
]);
