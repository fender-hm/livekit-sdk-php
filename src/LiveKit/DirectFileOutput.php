<?php

namespace T3mnikov\LiveKit;

/**
 */
class DirectFileOutput extends AbstractEntity
{
    /**
     * (optional)
     *
     */
    protected $filepath = '';
    protected $output;

    /**
     * (optional)
     *
     * @return string
     */
    public function getFilepath()
    {
        return $this->filepath;
    }

    /**
     * (optional)
     *
     * @param string $var
     * @return $this
     */
    public function setFilepath($var)
    {
        $this->filepath = $var;

        return $this;
    }
}

