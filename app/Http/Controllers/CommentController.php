<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\Comment\StoreComment;
use App\Http\Requests\Comment\updateComment;
use App\Http\Resources\Comment\CommentCollectionResource;
use App\Http\Resources\Comment\CommentResource;

class CommentController extends Controller
{
    /**
     * @return CommentCollectionResource
     */
    public function index(): CommentCollectionResource
    {
        return new CommentCollectionResource(Comment::paginate(10));
    }


    /**
     * @param StoreComment $comment
     * @return CommentResource
     */
    public function store(StoreComment $comment): CommentResource
    {


        Comment::create($comment->all());
        return new CommentResource($comment);
    }

    /**
     * @param Comment $comment
     * @return CommentResource
     */
    public function show(Comment $comment): CommentResource
    {
        return new CommentResource($comment);
    }

    /**
     * @param updateComment $updateComment
     * @param Comment $comment
     * @return CommentResource
     */
    public function update(updateComment $updateComment, Comment $comment): CommentResource
    {

        $comment->update($updateComment->all());
        return new CommentResource($comment);
    }

    /**
     * @param Comment $comment
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json();
    }
}
