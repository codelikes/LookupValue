<?php

declare(strict_types=1);

namespace Codelikes\LookupValue\Test;

use Codelikes\LookupValue\Facade;
use Codelikes\LookupValue\LookupValueServiceProvider;
use CreateLookupValueTable;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
        $this->setUpDatabase();
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    protected function getPackageProviders($app): array
    {
        return [
            LookupValueServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'LookupValue' => Facade::class,
        ];
    }

    protected function setUpDatabase()
    {
        include_once __DIR__ . '/../database/migrations/create_lookup_value_table.php';
        (new CreateLookupValueTable)->up();
    }
}
