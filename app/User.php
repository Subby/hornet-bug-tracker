<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Gets all the projects that this user owns.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany the projects
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Gets all the issues that this user owns.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany the issues
     */
    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}
