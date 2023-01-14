<?php namespace LaravelJsonMarshaller\Castables;

use Illuminate\Contracts\Database\Eloquent\Castable;
use LaravelJsonMarshaller\Casts\JsonMarshallable;

class AsJsonMarshallable implements Castable{

    /**
     * Get the name of the caster class to use when casting from / to this cast target.
     *
     * @param  array  $arguments
     * @return JsonMarshallable
     */
    public static function castUsing(array $arguments) : JsonMarshallable
    {
        return new JsonMarshallable(static::class);
    }
}