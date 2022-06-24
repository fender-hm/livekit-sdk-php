<?php

namespace T3mnikov\LiveKit;

use UnexpectedValueException;

/**
 */
class EncodingOptionsPreset
{
    /**
     *  720p, 30fps, 3000kpbs, H.264_MAIN / OPUS
     *
     */
    const H264_720P_30 = 0;
    /**
     *  720p, 60fps, 4500kbps, H.264_MAIN / OPUS
     *
     */
    const H264_720P_60 = 1;
    /**
     * 1080p, 30fps, 4500kbps, H.264_MAIN / OPUS
     *
     */
    const H264_1080P_30 = 2;
    /**
     * 1080p, 60fps, 6000kbps, H.264_MAIN / OPUS
     *
     */
    const H264_1080P_60 = 3;

    private static $valueToName = [
        self::H264_720P_30 => 'H264_720P_30',
        self::H264_720P_60 => 'H264_720P_60',
        self::H264_1080P_30 => 'H264_1080P_30',
        self::H264_1080P_60 => 'H264_1080P_60',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

