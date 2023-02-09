<?php

namespace T3mnikov\Services;

use T3mnikov\Exceptions\HttpRequestException;
use T3mnikov\LiveKit\DirectFileOutput;
use T3mnikov\LiveKit\EgressInfo;
use T3mnikov\LiveKit\EncodedFileOutput;

/**
 * Egress service
 */
class EgressService extends AbstractService
{
    /**
     * Send request for starts a room composite egress
     * @param string $roomName
     * @param string $layout
     * @param EncodedFileOutput $output
     * @param int $preset
     * @param bool $audioOnly
     * @param bool $videoOnly
     * @return EgressInfo
     * @throws HttpRequestException
     */
    public function startRoomCompositeEgress
    (
        string $roomName,
        string $layout,
        EncodedFileOutput $output,
        int $preset,
        bool $audioOnly,
        bool $videoOnly
    ) {
        $url = '/twirp/livekit.Egress/StartRoomCompositeEgress';

        $response = $this->getClient()->sendRequest($url, [
            'room_name'       => $roomName,
            'layout'          => $layout,
            'audio_only'      => $audioOnly,
            'video_only'      => $videoOnly,
            'custom_base_url' => null,
            'file'            => $output->toArray(),
            'stream'          => null,
            'preset'          => $preset,
            'advanced'        => null,
        ]);

        $data = json_decode((string)$response->getBody(), true);

        return new EgressInfo($data);
    }

    /**
     * Send request for starts a track composite egress with up to one audio track and one video track
     * @param string $roomName
     * @param EncodedFileOutput $output
     * @param int|null $preset
     * @param string $audioTrackId
     * @param string $videoTrackId
     * @return EgressInfo
     * @throws HttpRequestException
     */
    public function startTrackCompositeEgress
    (
        string $roomName,
        EncodedFileOutput $output,
        $preset,
        string $audioTrackId = '',
        string $videoTrackId = ''
    ) {
        $url = '/twirp/livekit.Egress/StartTrackCompositeEgress';

        $response = $this->getClient()->sendRequest($url, [
            'room_name'      => $roomName,
            'audio_track_id' => $audioTrackId,
            'video_track_id' => $videoTrackId,
            'file'           => $output->toArray(),
            'preset'         => $preset,
            'stream'         => null,
            'advanced'       => null,
        ]);

        $data = json_decode((string)$response->getBody(), true);

        return new EgressInfo($data);
    }

    /**
     * Send request for starts a track egress
     * @param string $roomName
     * @param DirectFileOutput $output
     * @param string $trackId
     * @return EgressInfo
     * @throws HttpRequestException
     */
    public function startTrackEgress(string $roomName, DirectFileOutput $output, string $trackId)
    {
        $url = '/twirp/livekit.Egress/StartTrackEgress';

        $response = $this->getClient()->sendRequest($url, [
            'room_name' => $roomName,
            'track_id'  => $trackId,
            'file'      => $output->toArray(),
        ]);

        $data = json_decode((string)$response->getBody(), true);

        return new EgressInfo($data);
    }

    /**
     * Send request for updates the web layout of an active egress room
     * @param string $egressId
     * @param string $layout
     * @return EgressInfo
     * @throws HttpRequestException
     */
    public function updateLayout(string $egressId, string $layout)
    {
        $url = '/twirp/livekit.Egress/UpdateLayout';

        $response = $this->getClient()->sendRequest($url, [
            'egress_id' => $egressId,
            'laytout'   => $layout,
        ]);

        $data = json_decode((string)$response->getBody(), true);

        return new EgressInfo($data);
    }

    /**
     * Send request for to receive a list of egress rooms
     * @param string $roomName
     * @return array
     * @throws HttpRequestException
     */
    public function listEgress(string $roomName)
    {
        $url = '/twirp/livekit.Egress/ListEgress';

        $response = $this->getClient()->sendRequest($url, ['room_name' => $roomName]);

        $data = json_decode((string)$response->getBody(), true);

        $result = [];
        foreach ($data['items'] as $item) {
            $result[] = new EgressInfo($item);
        }

        return $result;
    }

    /**
     * Send request for to stop egress
     * @param string $egressId
     * @return EgressInfo
     * @throws HttpRequestException
     */
    public function stopEgress(string $egressId)
    {
        $url = '/twirp/livekit.Egress/StopEgress';

        $response = $this->getClient()->sendRequest($url, ['egress_id' => $egressId]);

        $data = json_decode((string)$response->getBody(), true);

        return new EgressInfo($data);
    }
}