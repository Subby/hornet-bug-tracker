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

    /**
     * Gets the project the issue belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo the issue
     */
    public function project()
    {
        return $this->belongsTo(Issue::class);
    }
}
