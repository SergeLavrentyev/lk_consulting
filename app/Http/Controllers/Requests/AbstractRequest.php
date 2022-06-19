<?php

namespace App\Http\Controllers\Requests;

use GuzzleHttp\Client as Http;

abstract class AbstractRequest
{
    protected Http $http;
    protected string $address = 'https://megaplan';


    public function __construct(Http $http)
    {
        $this->http = $http;
    }

    /**
     * @param string $url
     * @param string $method
     * @param array $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function request(string $url, string $method, array $data = []): mixed
    {
        $path = $this->address;

        switch ($method) {
            case 'get':
                $path .= $url . '?' . json_encode($data);
                break;
            case 'post':
                $path .= $url;
                break;
        }

        try {
            $response = $this->http->request($method, $path, $data);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return json_decode($response->getBody(), true);
    }
}
