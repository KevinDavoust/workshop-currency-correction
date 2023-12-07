<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CurrencyChangeService
{
    public function __construct(
        private HttpClientInterface $client,
    ) {
    }

    public function callApi(string $baseCurrency, string $targetCurrency) {
        $response = $this->client->request(
            'GET',
            'https://v6.exchangerate-api.com/v6/b53c744c93fbc00f33e39033/latest/' . $baseCurrency
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
        return $content['conversion_rates'][$targetCurrency];

    }
    public function convertEurToDollar(float $euroPrice): float{

        $content = $this->callApi('EUR', 'USD');

        return round($euroPrice * $content, 1);
    }

    public function convertEurToYen(float $euroPrice): float{

        $content = $this->callApi('EUR', 'JPY');

        return round($euroPrice * $content, 1);
    }
}