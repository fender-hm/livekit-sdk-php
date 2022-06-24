<?php

namespace T3mnikov\LiveKit;

use UnexpectedValueException;

/**
 */
class EncodedFileType
{
    /**
     * file type chosen based on codecs
     *
     */
    const DEFAULT_FILETYPE = 0;
    /**
     */
    const MP4 = 1;
    /**
     */
    const OGG = 2;

    private static $valueToName = [
        self::DEFAULT_FILETYPE => 'DEFAULT_FILETYPE',
        self::MP4 => 'MP4',
        self::OGG => 'OGG',
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

