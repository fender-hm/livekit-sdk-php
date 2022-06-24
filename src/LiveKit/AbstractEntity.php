<?php

namespace T3mnikov\LiveKit;

/**
 * Abstract entity
 */
abstract class AbstractEntity
{
    /**
     * AbstractEntity constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        if (!empty($config)) {
            static::configure($this, $config);
        }
    }

    /**
     * Gets the properties of the given object
     * @param bool $withEmpty
     * @return array
     */
    public function toArray(bool $withEmpty = false): array
    {
        $array = get_object_vars($this);

        if ($withEmpty) {
            return array_filter($array);
        }

        return $array;
    }

    /**
     * Configure object properties
     * @param $object
     * @param $properties
     * @return mixed
     */
    protected static function configure($object, $properties)
    {
        foreach ($properties as $name => $value) {
            $object->$name = $value;
        }

        return $object;
    }
}