<?php namespace LaravelJsonMarshaller\Facades;

use Illuminate\Support\Facades\Facade;
use JsonMarshaller\JsonMarshaller as JsonMarshallerObject;

/**
 * @method static unmarshal(string $json, string $class)
 * @method static marshal(object $value)
 */
class JsonMarshaller extends Facade{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string {
        return JsonMarshallerObject::class;
    }
}