<?php

namespace App\Models\UserTraits;

use App\Models\User;

trait UserBelongsTrait
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
