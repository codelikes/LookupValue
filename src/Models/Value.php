<?php

declare(strict_types=1);

namespace Codelikes\LookupValue\Models;

use Codelikes\LookupValue\Contracts\Value as ValueContract;
use Carbon\Carbon;
use Codelikes\LookupValue\Exceptions\ValueDoesNotExistException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $lookup_id
 * @property string $key
 * @property string $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Value extends Model implements ValueContract
{
    protected $table = 'lookup_values';

    protected $fillable = [
        'lookup_id',
        'key',
        'value'
    ];

    public static function getByKey(string $key): ValueContract
    {
        return new static();
    }

    public function lookup(): BelongsTo
    {
        return $this->belongsTo(Lookup::class, 'lookup_id', 'id');
    }
}
