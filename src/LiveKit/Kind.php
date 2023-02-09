<?php

namespace T3mnikov\LiveKit;

/**
 */
class Kind
{
    /**
     */
    const RELIABLE = 0;
    /**
     */
    const LOSSY = 1;

    private static $valueToName = [
        self::RELIABLE => 'RELIABLE',
        self::LOSSY    => 'LOSSY',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            return null;
        }
        return self::$valueToName[$value];
    }
}