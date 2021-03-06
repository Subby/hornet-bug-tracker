<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{

    /**
     * The fillable attributes for a comment.
     *
     * @var array
     */
    protected $fillable = ['title', 'comment'];

    /**
     * Gets the user who owns the issue.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo the user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Gets the project the issue belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo the issue
     */
    public function project()
    {
        return $this->belongsTo(Issue::class);
    }

    /**
     * Get the comments belonging to this issue.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Gets all the tags that have been assigned to this issue.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }


}
