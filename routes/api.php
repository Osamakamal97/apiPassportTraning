<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('basic', 'BasicController@index');
Route::post('insert', 'BasicController@insert');


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('details', 'UserController@details');
    Route::get('show/{user}', 'UserController@show');
    Route::post('store', 'UserController@store');
    Route::resource('users', 'UserController');
    Route::resource('posts', 'PostController');
    Route::resource('comments', 'CommentController');

});


/**
 *
 */

//Route::post('/register','AuthController@register');
//Route::post('/login','AuthController@login');
//Route::resource('users', 'UsersController');
//Route::resource('posts', 'PostsController');
//Route::resource('comments', 'CommentsController');
////Get post for user by id
//Route::get('user/{user_id}/posts', function ($user_id) {
//    return \App\Post::getPostByUserId($user_id);
//});
////Get comment for post by id
//Route::get('post/{post_id}/comments', function ($post_id) {
//    return \App\Comment::getCommentForPost($post_id);
//});
////Get comment for user by id
//Route::get('user/{user_id}/comments', function ($user_id) {
//    return \App\User::getCommentsById($user_id);
//});

