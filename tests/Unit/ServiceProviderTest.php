<?php namespace Tests\Unit;

use Illuminate\Support\Facades\App;
use JsonMarshaller\JsonMarshaller;

class ServiceProviderTest extends BaseTestCase{

    /**
     * @test
     * @return void
     */
    public function it_loads_service_provider() : void
    {
        $instance = App::get(JsonMarshaller::class);

        $this->assertTrue($instance instanceof JsonMarshaller);
    }

}