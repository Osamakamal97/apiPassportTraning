<?php

namespace App;

use App\Http\Resources\Comment\CommentResource;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id', 'post_id'];

    public function post()
    {
        $this->belongsTo(Post::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public static function potato()
    {

    }

    public static function getCommentForPost($post_id): CommentResource
    {
        $comments = Comment::where('post_id', $post_id)->get();
        return new CommentResource($comments);
    }

}
