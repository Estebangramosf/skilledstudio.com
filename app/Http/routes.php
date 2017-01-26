<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('quienessomos', 'FrontController@QuienesSomos');

Route::get('/', 'HomeController@index');
Route::resource('posts', 'PostController');


Route::auth();



Route::get('test', 'HomeController@test');

//Route::get('dashboard', 'UserController@dashboard');




Route::resource('admins', 'AdminController');
Route::resource('moderators', 'ModeratorController');

//Route::resource('comments', 'CommentController');
Route::resource('posts.comments', 'CommentController');

/*
Route::resource('roles', 'RoleController');
Route::resource('multimedia', 'MultimediaController');
Route::resource('galleries', 'GalleryController');
*/


Route::group(['middleware' => 'auth'], function () {
    //Route::get('/', function ()    {
        // Uses Auth Middleware
        //return view('welcome');
    //});

    //Route::get('dashboard', 'UserController@dashboard');

    Route::get('profile', 'UserController@profile');//aqui tiene que tomar el id de Auth -> la sesión

    Route::get('user/profile', function () {
        // Uses Auth Middleware
    });
});