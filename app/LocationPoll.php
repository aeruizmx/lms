<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class LocationPoll extends Pivot
{
    public $incrementing = true;

    public $table = 'locations_has_polls';
}
