<?php

namespace T3mnikov\LiveKit;

/**
 */
class TrackInfo extends AbstractEntity
{
    /**
     */
    protected $sid = '';
    /**
     */
    protected $type = 0;
    /**
     */
    protected $name = '';
    /**
     */
    protected $muted = false;
    /**
     * original width of video (unset for audio)
     * clients may receive a lower resolution version with simulcast
     *
     */
    protected $width = 0;
    /**
     * original height of video (unset for audio)
     *
     */
    protected $height = 0;
    /**
     * true if track is simulcasted
     *
     */
    protected $simulcast = false;
    /**
     * true if DTX (Discontinuous Transmission) is disabled for audio
     *
     */
    protected $disable_dtx = false;
    /**
     * source of media
     *
     */
    protected $source = 0;
    /**
     */
    protected $layers;
    /**
     * mime type of codec
     *
     */
    protected $mime_type = '';
    /**
     */
    protected $mid = '';
    /**
     */
    protected $codecs;

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
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        $this->type = $var;

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
     * @return bool
     */
    public function getMuted()
    {
        return $this->muted;
    }

    /**
     * @param bool $var
     * @return $this
     */
    public function setMuted($var)
    {
        $this->muted = $var;

        return $this;
    }

    /**
     * original width of video (unset for audio)
     * clients may receive a lower resolution version with simulcast
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * original width of video (unset for audio)
     * clients may receive a lower resolution version with simulcast
     *
     * @param int $var
     * @return $this
     */
    public function setWidth($var)
    {
        $this->width = $var;

        return $this;
    }

    /**
     * original height of video (unset for audio)
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * original height of video (unset for audio)
     *
     * @param int $var
     * @return $this
     */
    public function setHeight($var)
    {
        $this->height = $var;

        return $this;
    }

    /**
     * true if track is simulcasted
     *
     * @return bool
     */
    public function getSimulcast()
    {
        return $this->simulcast;
    }

    /**
     * true if track is simulcasted
     *
     * @param bool $var
     * @return $this
     */
    public function setSimulcast($var)
    {
        $this->simulcast = $var;

        return $this;
    }

    /**
     * true if DTX (Discontinuous Transmission) is disabled for audio
     *
     * @return bool
     */
    public function getDisableDtx()
    {
        return $this->disable_dtx;
    }

    /**
     * true if DTX (Discontinuous Transmission) is disabled for audio
     *
     * @param bool $var
     * @return $this
     */
    public function setDisableDtx($var)
    {
        $this->disable_dtx = $var;

        return $this;
    }

    /**
     * source of media
     *
     * @return int
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * source of media
     *
     * @param int $var
     * @return $this
     */
    public function setSource($var)
    {
        $this->source = $var;

        return $this;
    }

    /**
     * @return
     */
    public function getLayers()
    {
        return $this->layers;
    }

    /**
     * @param
     * @return $this
     */
    public function setLayers($var)
    {
        $this->layers = $var;

        return $this;
    }

    /**
     * mime type of codec
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * mime type of codec
     *
     * @param string $var
     * @return $this
     */
    public function setMimeType($var)
    {
        $this->mime_type = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * @param string $var
     * @return $this
     */
    public function setMid($var)
    {
        $this->mid = $var;

        return $this;
    }

    /**
     */
    public function getCodecs()
    {
        return $this->codecs;
    }

    /**
     * @return $this
     */
    public function setCodecs($var)
    {
        $this->codecs = $var;

        return $this;
    }
}