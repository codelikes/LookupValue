<?php

declare(strict_types=1);

namespace Codelikes\LookupValue\Contracts;

use Codelikes\LookupValue\Exceptions\InvalidMappingException;
use Codelikes\LookupValue\Models\Value;
use Illuminate\Database\Eloquent\Collection;

interface Service
{
    /**
     * Get list of values by lookup name
     *
     * @param string $lookupName
     * @return Collection
     */
    public function getValues(string $lookupName): Collection;

    /**
     * Get value by value key
     *
     * @param string $key
     * @return Value|null
     */
    public function getValue(string $key): Value;

    /**
     * @param string $lookupName
     * @param array $values
     * @return Collection
     * @throws InvalidMappingException
     */
    public function mergeValues(string $lookupName, array $values): Collection;
}
