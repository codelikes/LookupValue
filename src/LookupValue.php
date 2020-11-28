<?php

declare(strict_types=1);

namespace Codelikes\LookupValue;

use Codelikes\LookupValue\Contracts\Service as ServiceContract;
use Codelikes\LookupValue\Exceptions\LookupDoesNotExistException;
use Codelikes\LookupValue\Models\Lookup;
use Codelikes\LookupValue\Models\Value;
use Illuminate\Database\Eloquent\Collection;

class LookupValue implements ServiceContract
{
    /**
     * @param string $lookupName
     * @return Collection
     * @throws LookupDoesNotExistException
     */
    public function getValues(string $lookupName): Collection
    {
        return Lookup::getValuesByLookupName($lookupName);
    }

    public function getValue(string $key): Value
    {
        return new Value();
    }

    public function mergeValues(string $lookupName, array $values): Collection
    {
        return new Collection();
    }
}
