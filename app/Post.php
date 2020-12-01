<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title', 'slug', 'content','is_online'];

    protected $guarded=[];

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getContentAttribute($value)
    {
        return $value;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
