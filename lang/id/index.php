<?php

$url = 'https://www.language.diw.co.id/api/id';

$headers = [
    'Content-Type' => env('HEADER_CONTENT_TYPE'),
    'Accept' => env('HEADER_ACCEPT'),
    'Key' => env('HEADER_KEY'),
];

$requestBody = [
    'custom' => false,
    'attribute' => false,
    'portfolio' => null,
];

$response = Http::withHeaders($headers)
    ->retry(3, 30)
    ->timeout(30)
    ->connectTimeout(3)
    ->throw()
    ->get($url, $requestBody);

$language = null;

if ($response->getStatusCode() == 200) {
    $responseBody = $response->json()['data'];

    $language = collect();
    foreach ($responseBody as $data) {
        $language = $language->merge($data);
    }
}

return $language;
