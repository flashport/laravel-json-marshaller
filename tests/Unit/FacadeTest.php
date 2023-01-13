<?php namespace Tests\Unit;

use LaravelJsonMarshaller\Facades\JsonMarshaller;
use Tests\Data\Tag;

class FacadeTest extends BaseTestCase{

    /**
     * @test
     * @return void
     */
    public function it_uses_the_facade_properly() : void
    {
        $tag = new Tag("testTag", "0.0.1");

        $json = JsonMarshaller::marshal($tag);

        $this->assertEquals(json_encode(["name" => "testTag", "version" => "0.0.1"]), $json);

        $unmarshalledTag = JsonMarshaller::unmarshal($json, Tag::class);

        $this->assertEquals($tag, $unmarshalledTag);
    }

}