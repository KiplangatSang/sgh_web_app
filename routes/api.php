<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/home', function (Request $request) {
    return "User";
});

//Route::middleware('auth:api')->get('/user/post/get-posts', [Api\User\PostController::class, 'index']);

Route::middleware('auth:api')->get('/user/post/get-post/{id}', [PostController::class, 'index']);

Route::get('/user/post/get-posts', 'Api\User\PostController@index')->name('posts');

