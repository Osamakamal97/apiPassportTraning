<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPostCount extends Model
{
    protected $fillable = ['user_id', 'post_max'];

    public function users()
    {
        return $this->hasOne(User::class);
    }

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }


    public function increaseUserMaxPosts()
    {

    }
}
