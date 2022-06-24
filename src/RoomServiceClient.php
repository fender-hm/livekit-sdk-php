<?php

namespace T3mnikov;

use T3mnikov\LiveKit\CreateRoomOptions;
use T3mnikov\LiveKit\ParticipantPermission;
use T3mnikov\Services\RoomService;

/**
 * Class is designed for communications with rooms
 */
class RoomServiceClient
{
    /**
     * @var string Livekit server host
     */
    protected $host;
    /**
     * @var string API key
     */
    protected $apiKey;
    /**
     * Secret key
     * @var string
     */
    protected $secret;
    /**
     * @var RoomService
     */
    protected $roomService;

    /**
     * RoomServiceClient constructor.
     * @param string $host
     * @param string $apiKey
     * @param string $secret
     */
    public function __construct(string $host, string $apiKey, string $secret)
    {
        $this->host = $host;
        $this->apiKey = $apiKey;
        $this->secret = $secret;
        $this->roomService = new RoomService($host);
    }

    /**
     * Create room
     * @param CreateRoomOptions $options
     * @return LiveKit\Room
     */
    public function createRoom(CreateRoomOptions $options)
    {
        $grants = new VideoGrant();
        $grants->setRoomCreate();

        $token = $this->getAuthToken($grants);
        return $this->roomService->setToken($token)->createRoom($options);
    }

    /**
     * Get rooms list
     * @param array $roomNames
     * @return array
     */
    public function listRooms(array $roomNames = [])
    {
        $grants = new VideoGrant();
        $grants->setRoomList();

        $token = $this->getAuthToken($grants);
        return $this->roomService->setToken($token)->listRooms($roomNames);
    }

    /**
     * Delete room
     * @param string $roomName
     * @return array
     * @throws Exceptions\HttpRequestException
     */
    public function deleteRoom(string $roomName)
    {
        $grants = new VideoGrant();
        $grants->setRoomCreate();

        $token = $this->getAuthToken($grants);
        return $this->roomService->setToken($token)->deleteRoom($roomName);
    }

    /**
     * Update room metadata
     * @param string $roomName
     * @param string $metaData
     * @return LiveKit\Room
     */
    public function updateRoomMetadata(string $roomName, string $metaData)
    {
        $grants = new VideoGrant();
        $grants->setRoomName($roomName);
        $grants->setRoomAdmin();

        $token = $this->getAuthToken($grants);
        return $this->roomService->setToken($token)->updateRoomMetadata($roomName, $metaData);
    }

    /**
     * Get participants list
     * @param string $roomName
     * @return array
     */
    public function listParticipants(string $roomName)
    {
        $grants = new VideoGrant();
        $grants->setRoomName($roomName);
        $grants->setRoomAdmin();

        $token = $this->getAuthToken($grants);
        return $this->roomService->setToken($token)->listParticipants($roomName);
    }

    /**
     * Get participant one
     * @param string $roomName
     * @param string $identity
     * @return LiveKit\ParticipantInfo
     */
    public function getParticipant(string $roomName, string $identity)
    {
        $grants = new VideoGrant();
        $grants->setRoomName($roomName);
        $grants->setRoomAdmin();

        $token = $this->getAuthToken($grants);
        return $this->roomService->setToken($token)->getParticipant($roomName, $identity);
    }

    /**
     * Remove participants from room
     * @param string $roomName
     * @param string $identity
     * @return array
     */
    public function removeParticipant(string $roomName, string $identity)
    {
        $grants = new VideoGrant();
        $grants->setRoomName($roomName);
        $grants->setRoomAdmin();

        $token = $this->getAuthToken($grants);
        return $this->roomService->setToken($token)->removeParticipant($roomName, $identity);
    }

    /**
     * Mute/unmute participant track by identity
     * @param string $roomName
     * @param string $identity
     * @param string $trackSid
     * @param bool $muted
     * @return LiveKit\TrackInfo
     */
    public function mutePublishedTrack(string $roomName, string $identity, string $trackSid, bool $muted)
    {
        $grants = new VideoGrant();
        $grants->setRoomName($roomName);
        $grants->setRoomAdmin();

        $token = $this->getAuthToken($grants);
        return $this->roomService->setToken($token)->mutePublishedTrack($roomName, $identity, $trackSid, $muted);
    }

    /**
     * Update participant
     * @param string $roomName
     * @param string $identity
     * @param string|null $metadata
     * @param ParticipantPermission|null $permission
     * @return LiveKit\ParticipantInfo
     */
    public function updateParticipant(string $roomName, string $identity, string $metadata = null, ParticipantPermission $permission = null)
    {
        $grants = new VideoGrant();
        $grants->setRoomName($roomName);
        $grants->setRoomAdmin();

        $token = $this->getAuthToken($grants);
        return $this->roomService->setToken($token)->updateParticipant($roomName, $identity, $metadata, $permission);
    }

    /**
     * Participant can subscribe or unsubscribe from the tracks of another participant
     * @param string $roomName
     * @param string $identity
     * @param array $trackSids
     * @param bool $subscribe
     * @return array
     */
    public function updateSubscriptions(string $roomName, string $identity, array $trackSids, bool $subscribe)
    {
        $grants = new VideoGrant();
        $grants->setRoomName($roomName);
        $grants->setRoomAdmin();

        $token = $this->getAuthToken($grants);
        return $this->roomService->setToken($token)->updateSubscriptions($roomName, $identity, $trackSids, $subscribe);
    }

    /**
     * Send data to all or concrete participant
     * @param string $roomName
     * @param string $data
     * @param int $kind
     * @param array $destinationSids
     * @return array
     */
    public function sendData(string $roomName, string $data, int $kind, array $destinationSids = [])
    {
        $grants = new VideoGrant();
        $grants->setRoomName($roomName);
        $grants->setRoomAdmin();

        $token = $this->getAuthToken($grants);
        return $this->roomService->setToken($token)->sendData($roomName, $data, $kind, $destinationSids);
    }

    /**
     * Get access token to make request
     * @param VideoGrant $grant
     * @return string
     */
    private function getAuthToken(VideoGrant $grant): string
    {
        $tokenOptions = new AccessTokenOptions();

        $accessToken = new AccessToken($this->apiKey, $this->secret, $tokenOptions);
        $accessToken->addGrant($grant);

        return $accessToken->getToken();
    }
}
