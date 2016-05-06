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

Route::get('/', array('as'=>'home', 'uses'=>'HomeController@get_index' ));

/* User Profile*/

Route::get('user/profile', array('before' => 'auth','as'=>'account', 'uses'=>'UserController@get_profile'));


/* For User Registration and Login */

Route::get('register', array('as'=>'register', 'uses'=>'UserController@get_registration'));
Route::get('login', array('as'=>'login', 'uses'=>'UserController@login'));//
Route::post('register', array('as'=>'postRegister', 'uses'=>'UserController@post_create'));
Route::post('login', array('as'=>'postLogin', 'uses'=>'UserController@post_login'));
Route::get('/logout', array('as'=>'logout', 'uses'=>'UserController@logout' ));

/* For Searching and Booking Tickets*/

Route::get('search', array('as'=>'search', 'uses'=>'BookController@getSearch'));
Route::get('search/{from}/{to}', array('as'=>'search_result', 'uses'=>'BookController@getResult'));
Route::post('search',['as'=>'postsearch', 'uses'=>'BookController@search'] );
Route::get('bus/{id}', array('as'=>'viewbus', 'uses'=>'BookController@viewBus'));
Route::get('bus/{id}/seat-selection', array('before' => 'auth','as'=>'seatselection','uses'=>'BookController@getSeat'));



/*Route::get('/', function()
{
	return View::make('hello');
});

Route::get('about', function(){
    return 'About content goes here.';
});

Route::get('about/direction', function(){
    return 'Direction go here.';
});*/
