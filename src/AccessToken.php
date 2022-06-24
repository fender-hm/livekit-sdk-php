<?php

namespace T3mnikov;

use Firebase\JWT\JWT;

/**
 * Class describes about access token for communications with Livekit server
 */
class AccessToken
{
    /**
     * The API Key.
     * @var string
     */
    protected $apiKey;
    /**
     * The API Secret.
     * @var string
     */
    protected $apiSecret;
    /**
     * The Access Token Grants
     * @var ClaimGrants
     */
    protected $grants;
    /**
     * The Access Token Identity
     * @var string
     */
    protected $identity;
    /**
     * The Time to live of the token. Defaults to 6 hours.
     * @var int
     */
    protected $ttl;

    /**
     * AccessToken constructor.
     * @param $apiKey
     * @param $apiSecret
     * @param AccessTokenOptions $options
     * @throws \Exception
     */
    public function __construct($apiKey, $apiSecret, AccessTokenOptions $options)
    {
        if (!$apiKey || !$apiSecret) {
            throw new \Exception('Api-key and api-secret are required.');
        }

        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->grants = new ClaimGrants();
        $this->identity = $options->getIdentity();
        $this->ttl = $options->getTtl();

        if ($options->getMetadata()) {
            $this->grants->setMetadata($options->getMetadata());
        }

        if ($options->getName()) {
            $this->grants->setName($options->getName());
        }
    }

    /**
     * Adds a video grant to this token.
     * @param VideoGrant
     */
    function addGrant(VideoGrant $videoGrant)
    {
        $this->grants->setVideoGrant($videoGrant);
    }

    /**
     * Set metadata to be passed to the Participant, used only when joining the room
     */
    function setMetadata($metadata)
    {
        $this->grants->setMetaData($metadata);
    }

    /**
     * Get SHA-256
     * @return string
     */
    function getSha256(): string
    {
        return $this->grants->getSha256();
    }

    /**
     * SET SHA-256
     * @param $sha
     */
    function setSha256($sha)
    {
        $this->grants->setSha256($sha);
    }

    /**
     * Get the JWT token string.
     * @return string A signed JWT
     * @throws \Exception
     */
    function getToken(): string
    {
        $payload = [];

        if ($this->identity) {
            $payload += [
                "sub" => $this->identity,
                "jti" => $this->identity,
            ];
        } elseif ($this->grants->getVideoGrant()->isRoomJoin()) {
            throw new \Exception('Identity is required for join but not set');
        }

        $jwt_timestamp = time();
        $payload += [
            "exp"   => $jwt_timestamp + $this->ttl,
            "nbf"   => $jwt_timestamp,
            "iat"   => $jwt_timestamp,
            "iss"   => $this->apiKey,
            "video" => $this->grants->getVideoGrant()->getData(),
        ];

        if ($metadata = $this->grants->getMetadata()) {
            $payload['metadata'] = $metadata;
        }

        return JWT::encode($payload, $this->apiSecret, 'HS256');
    }
}
