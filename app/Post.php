<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title', 'slug', 'content','is_online','user_id','category_id','is_featured','file'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
