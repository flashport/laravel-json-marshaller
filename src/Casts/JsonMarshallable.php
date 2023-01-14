<?php namespace LaravelJsonMarshaller\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Contracts\Database\Eloquent\SerializesCastableAttributes;
use Illuminate\Database\Eloquent\Model;
use LaravelJsonMarshaller\Facades\JsonMarshaller;

class JsonMarshallable implements CastsAttributes, SerializesCastableAttributes {


    protected string $targetClass;

    /**
     * @param string $targetClass
     */
    public function __construct(string $targetClass)
    {
        $this->targetClass = $targetClass;
    }


    /**
     * Cast the given value.
     *
     * @param  Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes): mixed
    {
        return JsonMarshaller::unmarshal($value ?? "", $this->targetClass);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  Model  $model
     * @param  string  $key
     * @param  object  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, string $key, $value, array $attributes): string
    {
        return JsonMarshaller::marshal($value);
    }

    /**
     * Get the serialized representation of the value.
     *
     * @param Model $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return string
     */
    public function serialize($model, string $key, $value, array $attributes) : string
    {
        return JsonMarshaller::marshal($value);
    }
}