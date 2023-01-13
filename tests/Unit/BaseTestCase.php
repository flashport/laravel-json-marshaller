<?php namespace Tests\Unit;


use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Orchestra\Testbench\TestCase;
use Tests\Data\Structures\CustomField;
use Tests\Data\Structures\Metadata;
use Tests\Data\User;
use Tests\Migrations\MigrationsProvider;

abstract class BaseTestCase extends TestCase{

    protected bool $performsDatabaseTests = false;

    use DatabaseMigrations;

    public function setUp() : void
    {

        if(! $this->performsDatabaseTests){
            return;
        }


        $metadata = new Metadata(true);

        $customFields = [
            new CustomField("accountBalance", "1000"),
            new CustomField("lastLogin", "2023-01-01 00:00:00")
        ];

        $user = User::create([
            "name"          => "John Doe",
            "email"         => "john.doe@email.com",
            "active"        => true,
            "metadata"      => $metadata,
            // "customFields"  => $customFields, TODO: Test it later
        ]);

        $this->assertEquals(1, User::query()->count());
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