<?php

namespace T3mnikov;

/**
 * Class describes about video grants
 */
class VideoGrant
{
    /**
     * Permission to create a room.
     * @var bool
     */
    protected $roomCreate = false;

    /**
     * Permission to join a room as a participant, room must be set.
     * @var bool
     */
    protected $roomJoin = false;

    /**
     * Permission to list rooms.
     * @var bool
     */
    protected $roomList = false;

    /**
     * Permission to start a recording.
     * @var bool
     */
    protected $roomRecord = false;

    /**
     * Permission to control a specific room, room must be set.
     * @var bool
     */
    protected $roomAdmin = false;

    /**
     * Name of the room, must be set for admin or join permissions.
     * @var string
     */
    protected $room;

    /**
     * Allow participant to publish. If neither canPublish or canSubscribe is set,
     * both publish and subscribe are enabled
     * @var bool
     */
    protected $canPublish = false;

    /**
     * Allow participant to subscribe to other tracks.
     * @var bool
     */
    protected $canSubscribe = false;

    /**
     * Allow participants to publish data, defaults to true if not set
     * @var bool
     */
    protected $canPublishData = false;

    /**
     * Participant isn't visible to others.
     * @var bool
     */
    protected $hidden = false;

    /**
     * Participant is recording the room, when set, allows room to indicate it's being recorded
     * @var bool
     */
    protected $recorder = false;

    /**
     * @return bool
     */
    public function isRoomCreate(): bool
    {
        return $this->roomCreate;
    }

    /**
     * @param bool $roomCreate
     */
    public function setRoomCreate(bool $roomCreate = true)
    {
        $this->roomCreate = $roomCreate;
    }

    /**
     * @return bool
     */
    public function isRoomJoin(): bool
    {
        return $this->roomJoin;
    }

    /**
     * @param bool $roomJoin
     */
    public function setRoomJoin(bool $roomJoin = true)
    {
        $this->roomJoin = $roomJoin;
    }

    /**
     * @return bool
     */
    public function isRoomList(): bool
    {
        return $this->roomList;
    }

    /**
     * @param bool $roomList
     */
    public function setRoomList(bool $roomList = true)
    {
        $this->roomList = $roomList;
    }

    /**
     * @return bool
     */
    public function isRoomRecord(): bool
    {
        return $this->roomRecord;
    }

    /**
     * @param bool $roomRecord
     */
    public function setRoomRecord(bool $roomRecord = true)
    {
        $this->roomRecord = $roomRecord;
    }

    /**
     * @return bool
     */
    public function isRoomAdmin(): bool
    {
        return $this->roomAdmin;
    }

    /**
     * @param bool $roomAdmin
     */
    public function setRoomAdmin(bool $roomAdmin = true)
    {
        $this->roomAdmin = $roomAdmin;
    }

    /**
     * @return string
     */
    public function getRoom(): string
    {
        return $this->room;
    }

    /**
     * @param string $roomName
     */
    public function setRoomName(string $roomName)
    {
        $this->room = $roomName;
    }

    /**
     * @return bool
     */
    public function isCanPublish(): bool
    {
        return $this->canPublish;
    }

    /**
     * @param bool $canPublish
     */
    public function setCanPublish(bool $canPublish = true)
    {
        $this->canPublish = $canPublish;
    }

    /**
     * @return bool
     */
    public function isCanSubscribe(): bool
    {
        return $this->canSubscribe;
    }

    /**
     * @param bool $canSubscribe
     */
    public function setCanSubscribe(bool $canSubscribe = true)
    {
        $this->canSubscribe = $canSubscribe;
    }

    /**
     * @return bool
     */
    public function isCanPublishData(): bool
    {
        return $this->canPublishData;
    }

    /**
     * @param bool $canPublishData
     */
    public function setCanPublishData(bool $canPublishData = true)
    {
        $this->canPublishData = $canPublishData;
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }

    /**
     * @param bool $hidden
     */
    public function setHidden(bool $hidden = true)
    {
        $this->hidden = $hidden;
    }

    /**
     * @return bool
     */
    public function isRecorder(): bool
    {
        return $this->recorder;
    }

    /**
     * @param bool $recorder
     */
    public function setRecorder(bool $recorder = true)
    {
        $this->recorder = $recorder;
    }

    /**
     * Return the object properties which have been defined as an array.
     *
     * @return array
     */
    public function getData()
    {
        return array_filter(get_object_vars($this));
    }
}
