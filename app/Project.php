<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Gets the user who owns the project.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo the user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
