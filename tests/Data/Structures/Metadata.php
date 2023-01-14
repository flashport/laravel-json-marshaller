<?php

namespace Tests\Data\Structures;

use LaravelJsonMarshaller\Castables\AsJsonMarshallable;

class Metadata extends AsJsonMarshallable
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