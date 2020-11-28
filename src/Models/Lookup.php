<?php

declare(strict_types=1);

namespace Codelikes\LookupValue\Models;

use Codelikes\LookupValue\Contracts\Lookup as LookupContract;
use Carbon\Carbon;
use Codelikes\LookupValue\Exceptions\LookupDoesNotExistException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Collection $values
 */
class Lookup extends Model implements LookupContract
{
    protected $table = 'lookups';

    protected $fillable = [
        'name'
    ];

    /**
     * Get values by lookup name
     *
     * @param string $name
     * @return Collection
     * @throws LookupDoesNotExistException
     */
    public static function getValuesByLookupName(string $name): Collection
    {
        $lookup = self::query()->firstOr(['name' => $name], function () use ($name) {
            throw LookupDoesNotExistException::withName($name);
        })->first();

        return $lookup->values;
    }

    /**
     * @return HasMany
     */
    public function values(): HasMany
    {
        return $this->hasMany(Value::class, 'lookup_id', 'id');
    }
}
