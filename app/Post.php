<?php

namespace App;

use App\Http\Resources\Post\PostsResource;
use App\Http\Resources\User\UsersResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function comments()
    {
        $this->hasMany(Comment::class);
    }

    public static function getPostByUserId($id): PostsResource
    {
        $posts = Post::all()->where('user_id', $id);
        return new PostsResource($posts);
    }

    public static function randomId()
    {
        return Post::all()->pluck('id')->random();
    }

    public static function refreshUsersPosts()
    {
        for ($id = 1; $id <= User::all()->count(); $id++) {
            $u = UserPostsCounter::where('user_id', $id)->update(['counter' => 0]);
        }
    }

    public static function postCount($user_id)
    {
        $count = Post::all()->where('user_id', $user_id)->count();
        return $count;
    }

}
