<?php

namespace Codelikes\LookupValue\Test;

use Codelikes\LookupValue\LookupValueServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
        $this->setUpDatabase($this->app);
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

    protected function getPackageProviders($app)
    {
        return [
            LookupValueServiceProvider::class,
        ];
    }

    protected function setUpDatabase($app)
    {
        include_once __DIR__ . '/../database/migrations/create_lookup_value_table.php';
        (new \CreateLookupValueTable)->up();
    }
}
