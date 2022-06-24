<?php

namespace T3mnikov\LiveKit;

/**
 */
class ParticipantInfo extends AbstractEntity
{
    /**
     */
    protected $sid = '';
    /**
     */
    protected $identity = '';
    /**
     */
    protected $state = 0;
    /**
     */
    protected $tracks;
    /**
     */
    protected $metadata = '';
    /**
     * timestamp when participant joined room, in seconds
     *
     */
    protected $joined_at = 0;
    /**
     */
    protected $name = '';
    /**
     */
    protected $version = 0;
    /**
     */
    protected $permission = null;
    /**
     */
    protected $region = '';
    /**
     * indicates the participant has an active publisher connection
     * and can publish to the server
     *
     */
    protected $is_publisher = false;


    /**
     * @return string
     */
    public function getSid()
    {
        return $this->sid;
    }

    /**
     * @param string $var
     * @return $this
     */
    public function setSid($var)
    {
        $this->sid = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param string $var
     * @return $this
     */
    public function setIdentity($var)
    {
        $this->identity = $var;

        return $this;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        $this->state = $var;

        return $this;
    }

    /**
     */
    public function getTracks()
    {
        return $this->tracks;
    }

    /**
     * @return $this
     */
    public function setTracks($var)
    {
        $this->tracks = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param string $var
     * @return $this
     */
    public function setMetadata($var)
    {
        $this->metadata = $var;

        return $this;
    }

    /**
     * timestamp when participant joined room, in seconds
     *
     * @return int|string
     */
    public function getJoinedAt()
    {
        return $this->joined_at;
    }

    /**
     * timestamp when participant joined room, in seconds
     *
     * @param int|string $var
     * @return $this
     */
    public function setJoinedAt($var)
    {
        $this->joined_at = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        $this->name = $var;

        return $this;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int $var
     * @return $this
     */
    public function setVersion($var)
    {
        $this->version = $var;

        return $this;
    }

    /**
     * @return \Livekit\ParticipantPermission|null
     */
    public function getPermission()
    {
        return $this->permission;
    }

    public function hasPermission()
    {
        return isset($this->permission);
    }

    public function clearPermission()
    {
        unset($this->permission);
    }

    /**
     * @param \Livekit\ParticipantPermission $var
     * @return $this
     */
    public function setPermission($var)
    {
        $this->permission = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $var
     * @return $this
     */
    public function setRegion($var)
    {
        $this->region = $var;

        return $this;
    }

    /**
     * indicates the participant has an active publisher connection
     * and can publish to the server
     *
     * @return bool
     */
    public function getIsPublisher()
    {
        return $this->is_publisher;
    }

    /**
     * indicates the participant has an active publisher connection
     * and can publish to the server
     *
     * @param bool $var
     * @return $this
     */
    public function setIsPublisher($var)
    {
        $this->is_publisher = $var;

        return $this;
    }
}

