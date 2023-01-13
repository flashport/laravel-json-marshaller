<?php namespace LaravelJsonMarshaller\Providers;

use Illuminate\Support\ServiceProvider;
use JsonMarshaller\JsonMarshaller;

class JsonMarshallerProvider extends ServiceProvider{

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(JsonMarshaller::class, function(){
            return new JsonMarshaller();
        });
    }
}