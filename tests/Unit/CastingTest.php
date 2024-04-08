<?php namespace Tests\Unit;

use Tests\Data\Structures\CustomField;
use Tests\Data\Structures\Metadata;

class CastingTest extends DatabaseTestCase
{

    /**
     * @return void
     */
    public function testItCastsSingleObjectWithNormalCast() : void
    {
        $user = $this->getUser();

        $this->assertEquals(Metadata::class, get_class($user->metadata));
        $this->assertTrue($user->metadata->admin);
    }

    /**
     * @return void
     */
    public function testItCastsArrayOfObjectsWithNormalCast() : void
    {
        $user = $this->getUser();

        $this->assertIsArray($user->customFields);

        $this->assertCount(2, $user->customFields);
        $this->assertEquals(CustomField::class, get_class($user->customFields[0]));

        $this->assertEquals("accountBalance",$user->customFields[0]->name);
        $this->assertEquals("1000",$user->customFields[0]->value);
    }

    /**
     * @return void
     */
    public function testItCastsSingleObjectWithCastable() : void
    {
        $user = $this->getUserWithCastables();

        $this->assertEquals(Metadata::class, get_class($user->metadata));
        $this->assertTrue($user->metadata->admin);
    }

    /**
     * @return void
     */
    public function testItCastsArrayOfObjectsWithCastable() : void
    {
        $user = $this->getUserWithCastables();

        $this->assertIsArray($user->customFields);

        $this->assertCount(2, $user->customFields);
        $this->assertEquals(CustomField::class, get_class($user->customFields[0]));

        $this->assertEquals("accountBalance",$user->customFields[0]->name);
        $this->assertEquals("1000",$user->customFields[0]->value);
    }


}