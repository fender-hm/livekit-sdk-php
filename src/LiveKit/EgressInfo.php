<?php

namespace T3mnikov\LiveKit;

/**
 */
class EgressInfo extends AbstractEntity
{
    /**
     */
    protected $egress_id = '';
    /**
     */
    protected $room_id = '';
    /**
     */
    protected $status = 0;
    /**
     */
    protected $started_at = 0;
    /**
     */
    protected $ended_at = 0;
    /**
     */
    protected $error = '';
    protected $request;
    protected $result;

    /**
     * @return string
     */
    public function getEgressId()
    {
        return $this->egress_id;
    }

    /**
     * @param string $var
     * @return $this
     */
    public function setEgressId($var)
    {
        $this->egress_id = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getRoomId()
    {
        return $this->room_id;
    }

    /**
     * @param string $var
     * @return $this
     */
    public function setRoomId($var)
    {
        $this->room_id = $var;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        $this->status = $var;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getStartedAt()
    {
        return $this->started_at;
    }

    /**
     * @param int|string $var
     * @return $this
     */
    public function setStartedAt($var)
    {
        $this->started_at = $var;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getEndedAt()
    {
        return $this->ended_at;
    }

    /**
     * @param int|string $var
     * @return $this
     */
    public function setEndedAt($var)
    {
        $this->ended_at = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string $var
     * @return $this
     */
    public function setError($var)
    {
        $this->error = $var;

        return $this;
    }

    /**
     * @return \Livekit\RoomCompositeEgressRequest|null
     */
    public function getRoomComposite()
    {
        return $this->readOneof(4);
    }

    public function hasRoomComposite()
    {
        return $this->hasOneof(4);
    }

    /**
     * @param \Livekit\RoomCompositeEgressRequest $var
     * @return $this
     */
    public function setRoomComposite($var)
    {
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * @return \Livekit\TrackCompositeEgressRequest|null
     */
    public function getTrackComposite()
    {
        return $this->readOneof(5);
    }

    public function hasTrackComposite()
    {
        return $this->hasOneof(5);
    }

    /**
     * @param \Livekit\TrackCompositeEgressRequest $var
     * @return $this
     */
    public function setTrackComposite($var)
    {
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * @return \Livekit\TrackEgressRequest|null
     */
    public function getTrack()
    {
        return $this->readOneof(6);
    }

    public function hasTrack()
    {
        return $this->hasOneof(6);
    }

    /**
     * @param \Livekit\TrackEgressRequest $var
     * @return $this
     */
    public function setTrack($var)
    {
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * @return \Livekit\StreamInfoList|null
     */
    public function getStream()
    {
        return $this->readOneof(7);
    }

    public function hasStream()
    {
        return $this->hasOneof(7);
    }

    /**
     * @param \Livekit\StreamInfoList $var
     * @return $this
     */
    public function setStream($var)
    {
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * @return \Livekit\FileInfo|null
     */
    public function getFile()
    {
        return $this->readOneof(8);
    }

    public function hasFile()
    {
        return $this->hasOneof(8);
    }

    /**
     * @param \Livekit\FileInfo $var
     * @return $this
     */
    public function setFile($var)
    {
        $this->writeOneof(8, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getRequest()
    {
        return $this->whichOneof("request");
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->whichOneof("result");
    }
}

