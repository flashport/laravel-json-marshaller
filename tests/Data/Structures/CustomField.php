<?php

namespace Tests\Data\Structures;

use LaravelJsonMarshaller\Castables\AsJsonMarshallable;

class CustomField extends AsJsonMarshallable
{
    public string $name;
    public string $value;

    /**
     * @param string $name
     * @param string $value
     */
    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }


}