<?php

namespace Tests\Data\Structures;

class Metadata
{
    public bool $admin;

    /**
     * @param bool $admin
     */
    public function __construct(bool $admin)
    {
        $this->admin = $admin;
    }


}