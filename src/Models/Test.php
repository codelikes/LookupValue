<?php

namespace Codelikes\LookupValue\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class Test extends Model
{
    protected $table = 'test';

    protected $fillable = [
        'name'
    ];
}
