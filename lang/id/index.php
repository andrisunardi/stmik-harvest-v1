<?php

use GuzzleHttp\Client;

$client = new Client();
$url = 'https://www.language.diw.co.id/api/id';

$params = [];

$headers = [
    'api-key' => '',
];

$response = $client->request('GET', $url, [
    'json' => $params,
    'headers' => $headers,
    'verify' => false,
]);

$language = null;

if ($response->getStatusCode() == 200) {
    $responseBody = json_decode($response->getBody());

    $language = collect();
    foreach ($responseBody->data as $data) {
        $language = $language->merge($data);
    }
}

return $language;
