<?php

namespace T3mnikov\Services;

use T3mnikov\Exceptions\HttpRequestException;
use T3mnikov\LiveKit\CreateRoomOptions;
use T3mnikov\LiveKit\ParticipantInfo;
use T3mnikov\LiveKit\ParticipantPermission;
use T3mnikov\LiveKit\Room;
use T3mnikov\LiveKit\TrackInfo;

/**
 * Room service
 */
class RoomService extends AbstractService
{
    /**
     * Send request for create room
     * @param CreateRoomOptions $options
     * @return Room
     * @throws HttpRequestException
     */
    public function createRoom(CreateRoomOptions $options)
    {
        $url = '/twirp/livekit.RoomService/CreateRoom';

        $response = $this->getClient()->sendRequest($url, $options->toArray());

        $data = json_decode((string)$response->getBody(), true);

        return new Room($data);
    }

    /**
     * Send request for to receive rooms list
     * @param array $roomNames
     * @return array
     * @throws HttpRequestException
     */
    public function listRooms(array $roomNames = [])
    {
        $url = '/twirp/livekit.RoomService/ListRooms';

        $response = $this->getClient()->sendRequest($url, ['names' => $roomNames]);

        $data = json_decode((string)$response->getBody(), true);

        $result = [];
        foreach ($data['rooms'] as $item) {
            $result[] = new Room($item);
        }

        return $result;
    }

    /**
     * Send request for delete room
     * @param string $roomName
     * @return array
     * @throws HttpRequestException
     */
    public function deleteRoom(string $roomName)
    {
        $url = '/twirp/livekit.RoomService/DeleteRoom';

        $this->getClient()->sendRequest($url, ['room' => $roomName]);

        return [];
    }

    /**
     * Send request for update room metadata
     * @param string $roomName
     * @param string $metaData
     * @return Room
     * @throws HttpRequestException
     */
    public function updateRoomMetadata(string $roomName, string $metaData)
    {
        $url = '/twirp/livekit.RoomService/UpdateRoomMetadata';

        $response = $this->getClient()->sendRequest($url, ['room' => $roomName, 'metadata' => $metaData]);

        $data = json_decode((string)$response->getBody(), true);

        return new Room($data);
    }

    /**
     * Send request for to receive participants list
     * @param string $roomName
     * @return array
     * @throws HttpRequestException
     */
    public function listParticipants(string $roomName)
    {
        $url = '/twirp/livekit.RoomService/ListParticipants';

        $response = $this->getClient()->sendRequest($url, ['room' => $roomName]);

        $data = json_decode((string)$response->getBody(), true);

        $result = [];
        foreach ($data['participants'] as $participant) {
            $result[] = new ParticipantInfo($participant);
        }
        return $result;
    }

    /**
     * Send request for to receive a participant
     * @param string $roomName
     * @param string $identity
     * @return ParticipantInfo
     * @throws HttpRequestException
     */
    public function getParticipant(string $roomName, string $identity)
    {
        $url = '/twirp/livekit.RoomService/GetParticipant';

        $response = $this->getClient()->sendRequest($url, ['room' => $roomName, 'identity' => $identity]);

        $data = json_decode((string)$response->getBody(), true);

        return new ParticipantInfo($data);
    }

    /**
     * Send request for delete a participant
     * @param string $roomName
     * @param string $identity
     * @return array
     * @throws HttpRequestException
     */
    public function removeParticipant(string $roomName, string $identity)
    {
        $url = '/twirp/livekit.RoomService/RemoveParticipant';

        $this->getClient()->sendRequest($url, ['room' => $roomName, 'identity' => $identity]);

        return [];
    }

    /**
     * Send request for mute/unmute a published track
     * @param string $roomName
     * @param string $identity
     * @param string $trackSid
     * @param bool $muted
     * @return TrackInfo
     * @throws HttpRequestException
     */
    public function mutePublishedTrack(string $roomName, string $identity, string $trackSid, bool $muted)
    {
        $url = '/twirp/livekit.RoomService/MutePublishedTrack';

        $response = $this->getClient()->sendRequest($url, [
            'room'      => $roomName,
            'identity'  => $identity,
            'track_sid' => $trackSid,
            'muted'     => $muted,
        ]);

        $data = json_decode((string)$response->getBody(), true);

        return new TrackInfo($data['track']);
    }

    /**
     * Send request for update participant
     * @param string $roomName
     * @param string $identity
     * @param string|null $metadata
     * @param ParticipantPermission|null $permission
     * @return ParticipantInfo
     * @throws HttpRequestException
     */
    public function updateParticipant(string $roomName, string $identity, string $metadata = null, ParticipantPermission $permission = null)
    {
        $url = '/twirp/livekit.RoomService/UpdateParticipant';

        $response = $this->getClient()->sendRequest($url, [
            'room'       => $roomName,
            'identity'   => $identity,
            'metadata'   => $metadata ?? '',
            'permission' => $permission ? $permission->toArray() : null,
        ]);

        $data = json_decode((string)$response->getBody(), true);

        return new ParticipantInfo($data);
    }

    /**
     * Send request for subscribes or unsubscribe a participant from tracks.
     * @param string $roomName
     * @param string $identity
     * @param array $trackSids
     * @param bool $subscribe
     * @return array
     * @throws HttpRequestException
     */
    public function updateSubscriptions(string $roomName, string $identity, array $trackSids, bool $subscribe)
    {
        $url = '/twirp/livekit.RoomService/UpdateSubscriptions';

        $this->getClient()->sendRequest($url, [
            'room'       => $roomName,
            'identity'   => $identity,
            'track_sids' => $trackSids,
            'subscribe'  => $subscribe,
        ]);

        return [];
    }

    /**
     * Send request for send data to participants
     * @param string $roomName
     * @param string $data
     * @param int $kind
     * @param array $destinationSids
     * @return array
     * @throws HttpRequestException
     */
    public function sendData(string $roomName, string $data, int $kind, array $destinationSids = [])
    {
        $url = '/twirp/livekit.RoomService/SendData';

        $this->getClient()->sendRequest($url, [
            'room'             => $roomName,
            'data'             => unpack('H*', $data)[1], //TODO need check it
            'kind'             => $kind,
            'destination_sids' => $destinationSids,
        ]);

        return [];
    }
}