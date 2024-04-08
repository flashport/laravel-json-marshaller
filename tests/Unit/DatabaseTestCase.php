<?php namespace Tests\Unit;


use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase;
use Tests\Data\Structures\CustomField;
use Tests\Data\Structures\Metadata;
use Tests\Data\User;
use Tests\Data\UserWithCastables;
use Tests\Migrations\MigrationsProvider;

abstract class DatabaseTestCase extends BaseTestCase{

    use RefreshDatabase;

    public function setUp() : void
    {

        parent::setUp();

        $metadata = new Metadata(true);

        $customFields = [
            new CustomField("accountBalance", "1000"),
            new CustomField("lastLogin", "2023-01-01 00:00:00")
        ];

        User::create([
            "name"          => "John Doe",
            "email"         => "john.doe@email.com",
            "active"        => true,
            "metadata"      => $metadata,
            "customFields"  => $customFields,
        ]);

        $this->assertEquals(1, User::query()->count());
    }

    /**
     * @return User
     */
    protected function getUser() : User
    {
        /** @var User $user */
        $user = User::query()->first();

        $this->assertNotEmpty($user);
        return $user;
    }

    /**
     * @return UserWithCastables
     */
    protected function getUserWithCastables() : UserWithCastables
    {
        /** @var UserWithCastables $user */
        $user = UserWithCastables::query()->first();

        $this->assertNotEmpty($user);
        return $user;
    }

    /**
     * Get package providers.
     *
     * @param  Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [MigrationsProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {

        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

}