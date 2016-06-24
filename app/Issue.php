<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    /**
     * Gets the user who owns the issue.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo the user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
