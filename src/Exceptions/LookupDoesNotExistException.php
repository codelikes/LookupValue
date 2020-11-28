<?php

declare(strict_types=1);

namespace Codelikes\LookupValue\Exceptions;

use InvalidArgumentException;

class LookupDoesNotExistException extends InvalidArgumentException
{
    public static function withName(string $name): LookupDoesNotExistException
    {
        return new static("Could not find lookup by name `{$name}`");
    }
}
