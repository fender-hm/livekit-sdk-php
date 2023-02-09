<?php

namespace T3mnikov;

/**
 * Access token options
 */
class AccessTokenOptions
{
    /**
     * The amount of time before expiration token
     * @var int
     */
    protected $ttl = 6 * 60 * 60;
    /**
     * The display name for the participant, available as `Participant.name`
     * @var string|null
     */
    protected $name;
    /**
     * The Identity of the user, required for room join tokens
     * @var string
     */
    protected $identity;
    /**
     * Custom metadata to be passed to participants.
     * @var string|null
     */
    protected $metadata;

    /**
     * @return int|string
     */
    public function getTtl(): int
    {
        return $this->ttl;
    }

    /**
     * @param int|string $ttl
     */
    public function setTtl(int $ttl)
    {
        $this->ttl = $ttl;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName( $name)
    {
        $this->name = $name;
    }

    /**
     * @return null|string
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param string $identity
     */
    public function setIdentity(string $identity)
    {
        $this->identity = $identity;
    }

    /**
     * @return string|null
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param string|null $metadata
     */
    public function setMetadata( $metadata)
    {
        $this->metadata = $metadata;
    }
}
