<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePost;
use App\Http\Requests\Post\UpdatePost;
use App\Http\Resources\Post\PostsResource;
use App\Http\Resources\Post\PostsResourceCollection;
use App\Mail\MonthlyUserEmail;
use App\Post;
use App\User;
use App\UserPostsCounter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): PostsResourceCollection
    {
        dd(Post::increaseUserMaxPosts());
        return new PostsResourceCollection(Post::paginate());
    }

    /**
     * @param StorePost $storePost
     * @return PostsResource
     */
    public function store(StorePost $storePost): PostsResource
    {
        $user_id = Auth::user()->id;
        $counter = Post::postCount($user_id);
        if ($counter >= 10) {
//            return response(['message' => 'you are reach maximum number of posts for this month']);
            return new PostsResource(['message' => 'you are reach maximum number of posts for this month']);
        } else {
            $add_user_id = \request()->all();
            $add_user_id['user_id'] = $user_id;
            Post::create($add_user_id);

            return new PostsResource($storePost);
        }
    }

    /**
     * @param Post $post
     * @return PostsResource
     */
    public function show(Post $post): PostsResource
    {
        return new PostsResource($post);
    }

    /**
     * @param UpdatePost $updatePost
     * @param Post $post
     * @return PostsResource
     */
    public function update(UpdatePost $updatePost, Post $post): PostsResource
    {
        dd();
        $post->update($updatePost->all());
        return new PostsResource($post);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json();
    }
}
