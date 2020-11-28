<?php

declare(strict_types=1);

namespace Codelikes\LookupValue;

use Codelikes\LookupValue\Contracts\Value;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * @method static Collection getValues(string $lookupName)
 * @method static Value getValue(string $key)
 * @method static Collection mergeValues(string $lookupName, array $values)
 */
class Facade extends LaravelFacade
{
    protected static function getFacadeAccessor(): string
    {
        return LookupValue::class;
    }
}
