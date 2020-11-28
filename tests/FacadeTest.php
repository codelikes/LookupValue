<?php

declare(strict_types=1);

namespace Codelikes\LookupValue\Test\Facades;

use Codelikes\LookupValue\Contracts\Value;
use PHPUnit\Framework\TestCase;

class FacadeTest extends TestCase
{
    public function testLaravelFacadeBinding()
    {
        $this->assertTrue(\LookupValue::getValue('foo') instanceof Value);
    }
}
