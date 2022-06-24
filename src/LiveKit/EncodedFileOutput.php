<?php

namespace T3mnikov\LiveKit;

/**
 */
class EncodedFileOutput extends AbstractEntity
{
    /**
     * (optional)
     *
     */
    protected $file_type = 0;
    /**
     * (optional)
     *
     */
    protected $filepath = '';
    protected $output;


    /**
     * (optional)
     *
     * @return int
     */
    public function getFileType()
    {
        return $this->file_type;
    }

    /**
     * (optional)
     *
     * @param int $var
     * @return $this
     */
    public function setFileType($var)
    {
        $this->file_type = $var;

        return $this;
    }

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

    /**
     * @return string
     */
    public function getOutput()
    {
        return $this->output;
    }
}

