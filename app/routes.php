<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [
		'as' => 'home',
		'uses' => 'PagesController@home'
]);


Route::get('register', [
		'as' => 'registration_path',
		'uses' => 'RegistrationController@create'
]);


Route::post('register', [
		'as' => 'registration_path',
		'uses' => 'RegistrationController@store'
]);

Route::get('login', [
		'as' => 'login_path',
		'uses' => 'SessionsController@create'
]);


Route::post('login', [
		'as' => 'login_path',
		'uses' => 'SessionsController@store'
]);

Route::get('logout', [
		'as' => 'logout_path',
		'uses' => 'SessionsController@destroy'
]);

Route::get('matches', [
		'as' => 'matches_path',
		'uses' => 'MatchesController@index'
]);

Route::get('matches/{id}', [
		'as' => 'match_path',
		'uses' => 'MatchesController@show'
]);

Route::post('matches', [
		'as' => 'match_path',
		'uses' => 'MatchesController@store'
]);

Route::get('remove_match/{id}', [
		'as' => 'remove_match_path',
		'uses' => 'MatchesController@destroy'
]);


Route::get('subscribe/{matchId}/{userId}', [
		'as' => 'subsciption_path',
		'uses' => 'SubscriptionController@store'
]);

Route::get('unsubscribe/{id}', [
		'as' => 'unsubsciption_path',
		'uses' => 'SubscriptionController@destroy'
]);

Route::get('subscriptions', [
		'as' => 'subsciptions_path',
		'uses' => 'SubscriptionController@index'
]);

// player routes
 
Route::get('players', [
		'as' => 'players_path',
		'uses' => 'PlayersController@index'
]);

Route::get('players/{id}/{skill}', [
		'as' => 'update_player_path',
		'uses' => 'PlayersController@update'
]);
