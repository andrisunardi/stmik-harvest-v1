<?php

$url = 'https://www.language.diw.co.id/api/en';

$headers = [
    'Content-Type' => env('HEADER_CONTENT_TYPE'),
    'Accept' => env('HEADER_ACCEPT'),
    'Key' => env('HEADER_KEY'),
];

$requestBody = [
    'custom' => true,
    'attribute' => false,
    'portfolio' => env('PORTFOLIO_ID'),
];

$response = Http::withHeaders($headers)
    ->retry(3, 60000)
    ->timeout(60)
    ->connectTimeout(60)
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
