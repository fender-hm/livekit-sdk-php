<?php

namespace T3mnikov\Http;

use GuzzleHttp\Exception\RequestException;
use T3mnikov\Exceptions\HttpRequestException;

/**
 * HTTP client
 */
class Client
{
    protected $host;
    protected $token;

    /**
     * Client constructor.
     * @param string $host
     * @param string $token
     */
    public function __construct(string $host, string $token)
    {
        $this->host = rtrim($host, '/');
        $this->token = $token;
    }

    /**
     * Send HTTP request
     * @param string $url
     * @param array $data
     * @param array $headers
     * @return \Psr\Http\Message\ResponseInterface
     * @throws HttpRequestException
     */
    public function sendRequest(string $url, array $data = [], array $headers = [])
    {
        try {
            return $this->post($url, $data, $headers);
        } catch (\Throwable $e) {
            throw $this->clientError($e);
        }
    }

    public function post(string $url, array $data = [], array $headers = [])
    {
        return $this->makeRequest('POST', $url, $data, $headers);
    }

    protected function makeRequest(string $method, string $url, array $data, array $headers = [])
    {
        $method = mb_strtoupper($method);
        $url = '/' . ltrim($url, '/');
        $headers['Authorization'] = "Bearer {$this->token}";

        return (new \GuzzleHttp\Client())->request(
            $method,
            "{$this->host}{$url}",
            ['headers' => $headers, 'json' => $data]
        );
    }

    protected function clientError(\Throwable $e): HttpRequestException
    {
        $httpCode = 0;

        if ($e instanceof RequestException) {
            if ($e->getResponse()) {
                $httpCode = $e->getResponse()->getStatusCode();
            }
        }

        return new HttpRequestException($e->getMessage(), $httpCode, $e);
    }
}