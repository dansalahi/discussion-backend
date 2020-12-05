<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Channel extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }
}
