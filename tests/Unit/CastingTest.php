<?php namespace Tests\Unit;

use Tests\Data\Structures\CustomField;
use Tests\Data\Structures\Metadata;

class CastingTest extends DatabaseTestCase
{

    /**
     * @test
     * @return void
     */
    public function it_casts_single_object_with_normal_cast() : void
    {
        $user = $this->getUser();

        $this->assertEquals(Metadata::class, get_class($user->metadata));
        $this->assertTrue($user->metadata->admin);
    }

    /**
     * @test
     * @return void
     */
    public function it_casts_array_of_objects_with_normal_cast() : void
    {
        $user = $this->getUser();

        $this->assertIsArray($user->customFields);

        $this->assertCount(2, $user->customFields);
        $this->assertEquals(CustomField::class, get_class($user->customFields[0]));

        $this->assertEquals("accountBalance",$user->customFields[0]->name);
        $this->assertEquals("1000",$user->customFields[0]->value);
    }

    /**
     * @test
     * @return void
     */
    public function it_casts_single_object_with_castable() : void
    {
        $user = $this->getUserWithCastables();

        $this->assertEquals(Metadata::class, get_class($user->metadata));
        $this->assertTrue($user->metadata->admin);
    }

    /**
     * @test
     * @return void
     */
    public function it_casts_array_of_objects_with_castable() : void
    {
        $user = $this->getUserWithCastables();

        $this->assertIsArray($user->customFields);

        $this->assertCount(2, $user->customFields);
        $this->assertEquals(CustomField::class, get_class($user->customFields[0]));

        $this->assertEquals("accountBalance",$user->customFields[0]->name);
        $this->assertEquals("1000",$user->customFields[0]->value);
    }


}