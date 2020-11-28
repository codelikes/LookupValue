<?php

declare(strict_types=1);

namespace Codelikes\LookupValue\Test\Models;

use Codelikes\LookupValue\Exceptions\LookupDoesNotExistException;
use Codelikes\LookupValue\Models\Lookup;
use Codelikes\LookupValue\Test\TestCase;
use Illuminate\Database\Eloquent\Collection;

class LookupTest extends TestCase
{
    public function testLookupDoesNotExistException()
    {
        $this->expectException(LookupDoesNotExistException::class);

        Lookup::getValuesByLookupName('does_not_exist_name');
    }

    public function testModelRelationWithValues()
    {
        /** @var Lookup $lookup */
        $lookup = Lookup::create(['name' => 'lookup']);

        $lookup->values()->create([
            'key' => 'foo',
            'value' => 'bar'
        ]);

        $lookup->values()->create([
            'key' => 'foo1',
            'value' => 'bar1'
        ]);

        $this->assertTrue($lookup->values instanceof Collection);
        $this->assertTrue($lookup->values->count() === 2);
        $this->assertTrue($lookup->values->first()->lookup->id == $lookup->id);

    }

    public function testGetValuesByLookupName()
    {
        /** @var Lookup $lookup */
        $lookup = Lookup::create(['name' => 'lookup']);

        $lookup->values()->create([
            'key' => 'foo',
            'value' => 'bar'
        ]);

        $lookup->values()->create([
            'key' => 'foo1',
            'value' => 'bar1'
        ]);

        $values = Lookup::getValuesByLookupName('lookup');

        $this->assertTrue($values instanceof Collection);
        $this->assertTrue($values->count() == 2);
    }
}
