<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TagTask extends Pivot
{

    protected $fillable = [
        'task_id',
        'tag_id',
    ];
}
