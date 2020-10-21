<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Channel extends Model
{
    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }
}
