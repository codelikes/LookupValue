<?php

declare(strict_types=1);

namespace Codelikes\LookupValue\Contracts;

use Codelikes\LookupValue\Exceptions\ValueDoesNotExistException;

interface Value
{
    /**
     * Find a value by key
     *
     * @param string $key
     * @return static
     * @throws ValueDoesNotExistException
     */
    public static function getByKey(string $key): self;
}
