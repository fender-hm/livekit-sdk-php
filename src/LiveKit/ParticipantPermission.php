<?php

namespace T3mnikov\LiveKit;

/**
 */
class ParticipantPermission extends AbstractEntity
{
    /**
     * allow participant to subscribe to other tracks in the room
     *
     */
    protected $can_subscribe = false;
    /**
     * allow participant to publish new tracks to room
     *
     */
    protected $can_publish = false;
    /**
     * allow participant to publish data
     *
     */
    protected $can_publish_data = false;
    /**
     * indicates that it's hidden to others
     *
     */
    protected $hidden = false;
    /**
     * indicates it's a recorder instance
     *
     */
    protected $recorder = false;

    /**
     * allow participant to subscribe to other tracks in the room
     *
     * @return bool
     */
    public function getCanSubscribe()
    {
        return $this->can_subscribe;
    }

    /**
     * allow participant to subscribe to other tracks in the room
     *
     * @param bool $var
     * @return $this
     */
    public function setCanSubscribe($var)
    {
        $this->can_subscribe = $var;

        return $this;
    }

    /**
     * allow participant to publish new tracks to room
     *
     * @return bool
     */
    public function getCanPublish()
    {
        return $this->can_publish;
    }

    /**
     * allow participant to publish new tracks to room
     *
     * @param bool $var
     * @return $this
     */
    public function setCanPublish($var)
    {
        $this->can_publish = $var;

        return $this;
    }

    /**
     * allow participant to publish data
     *
     * @return bool
     */
    public function getCanPublishData()
    {
        return $this->can_publish_data;
    }

    /**
     * allow participant to publish data
     *
     * @param bool $var
     * @return $this
     */
    public function setCanPublishData($var)
    {
        $this->can_publish_data = $var;

        return $this;
    }

    /**
     * indicates that it's hidden to others
     *
     * @return bool
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * indicates that it's hidden to others
     *
     * @param bool $var
     * @return $this
     */
    public function setHidden($var)
    {
        $this->hidden = $var;

        return $this;
    }

    /**
     * indicates it's a recorder instance
     *
     * @return bool
     */
    public function getRecorder()
    {
        return $this->recorder;
    }

    /**
     * indicates it's a recorder instance
     *
     * @param bool $var
     * @return $this
     */
    public function setRecorder($var)
    {
        $this->recorder = $var;

        return $this;
    }

}

