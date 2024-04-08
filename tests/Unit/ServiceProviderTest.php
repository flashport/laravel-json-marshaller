<?php namespace Tests\Unit;

use Illuminate\Support\Facades\App;
use JsonMarshaller\JsonMarshaller;

class ServiceProviderTest extends BaseTestCase{

    /**
     * @return void
     */
    public function testItLoadsServiceProvider() : void
    {
        $instance = App::get(JsonMarshaller::class);

        $this->assertTrue($instance instanceof JsonMarshaller);
    }

}