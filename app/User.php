<?php

namespace App;

use App\Http\Resources\Comment\CommentResource;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function comments()
    {
        $this->hasMany(Comment::class);
    }

    public function posts()
    {
        $this->hasMany(Post::class);
    }

    public static function randomId()
    {
        return User::all()->pluck('id')->random();
    }

    public static function getCommentsById($id): CommentResource
    {

        $comments = Comment::where('user_id', $id)->get();
        return new CommentResource($comments);
    }

}
