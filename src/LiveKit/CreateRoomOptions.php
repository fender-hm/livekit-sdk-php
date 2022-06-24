<?php

namespace T3mnikov\LiveKit;

/**
 * Options for create the room
 */
class CreateRoomOptions extends AbstractEntity
{
    /**
     * @var string Name of the room
     */
    protected $name = '';
    /**
     * @var int Number of seconds to keep the room open if no one joins
     */
    protected $empty_timeout = 0;
    /**
     * @var int Limit number of participants that can be in a room
     */
    protected $max_participants = 0;
    /**
     * @var string Override the node room is allocated to, for debugging
     */
    protected $node_id = '';
    /**
     * @var string metadata of room
     */
    protected $metadata = '';

    /**
     * name of the room
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * name of the room
     *
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        $this->name = $var;

        return $this;
    }

    /**
     * number of seconds to keep the room open if no one joins
     *
     * @return int
     */
    public function getEmptyTimeout()
    {
        return $this->empty_timeout;
    }

    /**
     * number of seconds to keep the room open if no one joins
     *
     * @param int $var
     * @return $this
     */
    public function setEmptyTimeout($var)
    {
        $this->empty_timeout = $var;

        return $this;
    }

    /**
     * limit number of participants that can be in a room
     *
     * @return int
     */
    public function getMaxParticipants()
    {
        return $this->max_participants;
    }

    /**
     * limit number of participants that can be in a room
     *
     * @param int $var
     * @return $this
     */
    public function setMaxParticipants($var)
    {
        $this->max_participants = $var;

        return $this;
    }

    /**
     * override the node room is allocated to, for debugging
     *
     * @return string
     */
    public function getNodeId()
    {
        return $this->node_id;
    }

    /**
     * override the node room is allocated to, for debugging
     *
     * @param string $var
     * @return $this
     */
    public function setNodeId($var)
    {
        $this->node_id = $var;

        return $this;
    }

    /**
     * metadata of room
     *
     * @return string
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * metadata of room
     *
     * @param string $var
     * @return $this
     */
    public function setMetadata($var)
    {
        $this->metadata = $var;

        return $this;
    }
}