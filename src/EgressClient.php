<?php

namespace T3mnikov;

use T3mnikov\LiveKit\DirectFileOutput;
use T3mnikov\LiveKit\EncodedFileOutput;
use T3mnikov\LiveKit\EncodingOptionsPreset;
use T3mnikov\Services\EgressService;

/**
 * Class is designed for communications with Egress service
 */
class EgressClient
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
     * @var EgressService
     */
    protected $egressService;

    /**
     * EgressClient constructor.
     * @param string $host
     * @param string $apiKey
     * @param string $secret
     */
    public function __construct(string $host, string $apiKey, string $secret)
    {
        $this->host = $host;
        $this->apiKey = $apiKey;
        $this->secret = $secret;
        $this->egressService = new EgressService($host);
    }

    /**
     * Starts a room composite egress which uses a web template
     * @param string $roomName
     * @param string $layout
     * @param EncodedFileOutput $output
     * @param int $preset
     * @param bool $audioOnly
     * @param bool $videoOnly
     * @return LiveKit\EgressInfo
     */
    public function startRoomCompositeEgress
    (
        string $roomName,
        string $layout,
        EncodedFileOutput $output,
        int $preset = EncodingOptionsPreset::H264_720P_60,
        bool $audioOnly = false,
        bool $videoOnly = false
    ) {
        $grants = new VideoGrant();
        $grants->setRoomRecord();

        $token = $this->getAuthToken($grants);
        return $this->egressService->setToken($token)->startRoomCompositeEgress(
            $roomName,
            $layout,
            $output,
            $preset,
            $audioOnly,
            $videoOnly
        );
    }

    /**
     * Starts a track composite egress with up to one audio track and one video track
     * @param string $roomName
     * @param EncodedFileOutput $output
     * @param int|null $preset
     * @param string $audioTrackId
     * @param string $videoTrackId
     * @return LiveKit\EgressInfo
     * @throws \Exception
     */
    public function startTrackCompositeEgress
    (
        string $roomName,
        EncodedFileOutput $output,
        $preset = null,
        string $audioTrackId = '',
        string $videoTrackId = ''
    ) {
        throw new \Exception('not works, invalid argument');

        $grants = new VideoGrant();
        $grants->setRoomRecord();

        $token = $this->getAuthToken($grants);
        return $this->egressService->setToken($token)->startTrackCompositeEgress(
            $roomName,
            $output,
            $preset,
            $audioTrackId,
            $videoTrackId
        );
    }

    /**
     * Starts a track egress
     * @param string $roomName
     * @param DirectFileOutput $output
     * @param string $trackId
     * @return LiveKit\EgressInfo
     */
    public function startTrackEgress(string $roomName, DirectFileOutput $output, string $trackId)
    {
        $grants = new VideoGrant();
        $grants->setRoomRecord();

        $token = $this->getAuthToken($grants);
        return $this->egressService->setToken($token)->startTrackEgress($roomName, $output, $trackId);
    }

    /**
     * Updates the web layout of an active egress room
     * @param string $egressId
     * @param string $layout
     * @return LiveKit\EgressInfo
     * @throws \Exception
     */
    public function updateLayout(string $egressId, string $layout)
    {
        throw new \Exception('not works, auth trouble');

        $grants = new VideoGrant();
        $grants->setRoomRecord();

        $token = $this->getAuthToken($grants);
        return $this->egressService->setToken($token)->updateLayout($egressId, $layout);
    }

    /**
     * Gets the list of active egress. Does not include completed egress
     * @param string $roomName
     * @return array
     */
    public function listEgress(string $roomName = '')
    {
        $grants = new VideoGrant();
        $grants->setRoomRecord();

        $token = $this->getAuthToken($grants);
        return $this->egressService->setToken($token)->listEgress($roomName);
    }

    /**
     * Stops an active egress
     * @param string $egressId
     * @return LiveKit\EgressInfo
     */
    public function stopEgress(string $egressId)
    {
        $grants = new VideoGrant();
        $grants->setRoomRecord();

        $token = $this->getAuthToken($grants);
        return $this->egressService->setToken($token)->stopEgress($egressId);
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