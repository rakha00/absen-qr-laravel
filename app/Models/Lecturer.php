<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecturer extends User
{
    protected $table = 'users';

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'user_id');
    }
}
