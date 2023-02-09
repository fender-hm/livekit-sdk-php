<?php

namespace T3mnikov;

/**
 * Class describes claim grants
 */
class ClaimGrants
{
    /**
     * The display name of the participant
     * @var string
     */
    protected $name;
    /**
     * Video grants.
     * @var null|VideoGrant
     */
    protected $videoGrant;
    /**
     * Metadata
     * @var null|string
     */
    protected $metadata;
    /**
     * @var string
     */
    protected $sha256;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return VideoGrant
     */
    public function getVideoGrant()
    {
        return $this->videoGrant;
    }

    /**
     * @param VideoGrant
     */
    public function setVideoGrant(VideoGrant $videoGrant)
    {
        $this->videoGrant = $videoGrant;
    }

    /**
     * @return null|string
     */
    public function getMetadata(): ?string
    {
        return $this->metadata;
    }

    /**
     * @param string $metadata
     */
    public function setMetadata(string $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return string
     */
    public function getSha256(): string
    {
        return $this->sha256;
    }

    /**
     * @param string $sha256
     */
    public function setSha256(string $sha256)
    {
        $this->sha256 = $sha256;
    }
}
