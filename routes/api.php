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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'App\Http\Controllers\UserController@login');
Route::post('register', 'App\Http\Controllers\UserController@register');

Route::group(['middleware' => 'auth:sanctum'], function(){
Route::apiResource('author', 'App\Http\Controllers\AuthorController');
Route::apiResource('book', 'App\Http\Controllers\BookController');
Route::GET('author/search/{term}', 'App\Http\Controllers\AuthorController@search');
Route::GET('book/search/{look}', 'App\Http\Controllers\BookController@search');
});