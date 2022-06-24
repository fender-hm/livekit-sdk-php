<?php

namespace T3mnikov\LiveKit;

class Room extends AbstractEntity
{
    /**
     */
    protected $sid = '';
    /**
     */
    protected $name = '';
    /**
     */
    protected $empty_timeout = 0;
    /**
     */
    protected $max_participants = 0;
    /**
     */
    protected $creation_time = 0;
    /**
     */
    protected $turn_password = '';
    /**
     */
    protected $enabled_codecs;
    /**
     */
    protected $metadata = '';
    /**
     */
    protected $num_participants = 0;
    /**
     */
    protected $active_recording = false;


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
    public function getEmptyTimeout()
    {
        return $this->empty_timeout;
    }

    /**
     * @param int $var
     * @return $this
     */
    public function setEmptyTimeout($var)
    {
        $this->empty_timeout = $var;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxParticipants()
    {
        return $this->max_participants;
    }

    /**
     * @param int $var
     * @return $this
     */
    public function setMaxParticipants($var)
    {
        $this->max_participants = $var;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getCreationTime()
    {
        return $this->creation_time;
    }

    /**
     * @param int|string $var
     * @return $this
     */
    public function setCreationTime($var)
    {
        $this->creation_time = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getTurnPassword()
    {
        return $this->turn_password;
    }

    /**
     * @param string $var
     * @return $this
     */
    public function setTurnPassword($var)
    {
        $this->turn_password = $var;

        return $this;
    }

    /**
     */
    public function getEnabledCodecs()
    {
        return $this->enabled_codecs;
    }

    /**
     * @return $this
     */
    public function setEnabledCodecs($var)
    {
        $this->enabled_codecs = $var;

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
     * @return int
     */
    public function getNumParticipants()
    {
        return $this->num_participants;
    }

    /**
     * @param int $var
     * @return $this
     */
    public function setNumParticipants($var)
    {
        $this->num_participants = $var;

        return $this;
    }

    /**
     * @return bool
     */
    public function getActiveRecording()
    {
        return $this->active_recording;
    }

    /**
     * @param bool $var
     * @return $this
     */
    public function setActiveRecording($var)
    {
        $this->active_recording = $var;

        return $this;
    }
}