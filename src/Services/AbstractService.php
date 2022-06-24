<?php

namespace T3mnikov\Services;

use T3mnikov\Http\Client;

/**
 * Abstract service
 */
abstract class AbstractService
{
    /**
     * @var string Livekit server host
     */
    protected $host;
    /**
     * @var string Access token
     */
    protected $token;

    /**
     * AbstractService constructor.
     * @param string $host
     */
    public function __construct(string $host)
    {
        $this->host = $this->urlBase($host);
    }

    /**
     * Set token
     * @param mixed $token
     * @return AbstractService
     */
    public function setToken($token): self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Get HTTP client
     * @return Client
     * @throws \Exception
     */
    protected function getClient()
    {
        $this->checkRequiredParams();
        return new Client($this->host, $this->token);
    }

    /**
     * Handle base url
     * @param string $addr
     * @return string
     */
    protected function urlBase(string $addr): string
    {
        $scheme = parse_url($addr, PHP_URL_SCHEME);

        // If parse_url fails, return the addr unchanged.
        if ($scheme === false) {
            return $addr;
        }

        // If the addr does not specify a scheme, default to http.
        if (empty($scheme)) {
            $addr = 'http://' . ltrim($addr, ':/');
        }

        return $addr;
    }

    /**
     * Check required params before make request
     * @throws \Exception
     */
    protected function checkRequiredParams()
    {
        if ($this->token === null) {
            throw new \Exception();
        }
    }
}