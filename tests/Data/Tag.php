<?php namespace Tests\Data;

class Tag{

    public string $name;

    public string $version;

    /**
     * @param string $name
     * @param string $version
     */
    public function __construct(string $name, string $version)
    {
        $this->name = $name;
        $this->version = $version;
    }


}