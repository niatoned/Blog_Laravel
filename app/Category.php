<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name', 'slug'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
