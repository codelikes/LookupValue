<?php

declare(strict_types=1);

namespace Codelikes\LookupValue\Test;

class ConfigRepositoryTest extends TestCase
{
    public function testCanGetConfigArray()
    {
        $this->assertIsArray(config('lookupvalues', null));
    }
}
