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

Route::get('socket', 'SocketController@index');
Route::post('sendmessage', 'SocketController@sendMessage');
Route::get('writemessage', 'SocketController@writemessage');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::post('sendChatMessage', 'ChatController@newMessage');

Route::get('reddit/{subReddit}', 'RedditController@index');
Route::get('reddit/getStory/{id}', 'RedditController@getStory');

Route::get('userProfile/{id}', 'ProfileController@userProfile');

Route::post('uploadPhoto', 'ProfileController@updatePhoto');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
