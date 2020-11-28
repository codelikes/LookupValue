<?php

declare(strict_types=1);

namespace Codelikes\LookupValue\Contracts;

use Codelikes\LookupValue\Exceptions\LookupDoesNotExistException;
use Illuminate\Database\Eloquent\Collection;

interface Lookup
{
    /**
     * Get values by lookup name
     *
     * @param string $name
     * @return Collection
     * @throws LookupDoesNotExistException
     */
    public static function getValuesByLookupName(string $name): Collection;
}
