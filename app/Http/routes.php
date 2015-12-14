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

Route::get('/', 'IndexController@index');

// routes securisée
Route::group(['middleware' => 'auth'], function () {

	/*
	|--------------------------------------------------------------------------
	| Forum
	|--------------------------------------------------------------------------
	*/
	Route::get('/forum', 'TopicController@index');

	Route::get('/forum/create', 'TopicController@create');
	Route::post('/forum/create', 'TopicController@store');

	Route::get('/forum/show/{id}', ['uses' =>'TopicController@show']);
	Route::post('/forum/show/{id}', ['uses' => 'PostController@store']);

	Route::post('/forum/delete', ['uses' => 'TopicController@destroy']);

	Route::post('/forum/update/{id}', ['uses' => 'TopicController@update']);

	Route::post('/post/delete', ['uses' => 'PostController@destroy']);

	/*
	|--------------------------------------------------------------------------
	| Games
	|--------------------------------------------------------------------------
	*/
	Route::get('/games', 'GameController@index');
	Route::get('games/synonyms', 'GameController@synonyms');
	Route::post('games/synonyms/submit', 'GameController@post_synonyms');


	Route::get('/administration', 'AdminController@index')->name('administration');
	/* --> Actualités */
	Route::resource('/administration/news', 'NewsController');
});

/*
|--------------------------------------------------------------------------
| Administration
|--------------------------------------------------------------------------
*/
//Route::group(['middleware' => 'auth'], function () {
//
//	Route::get('/administration', 'AdminController@index')->name('administration');
//	/* --> Actualités */
//	Route::resource('news', 'NewsController');
//
////	Route::get('/administration/news', 'AdminController@displayNews')->name('AdminDisplayNews');
////	Route::get('/administration/news/create', 'AdminController@createNews')->name('AdminCreateNews');
////	Route::post('/administration/news/create', 'AdminController@storeNews');
////	Route::get('/administration/news/update/{id}', 'AdminController@editNews');
////	Route::post('/administration/news/update/{id}', 'AdminController@updateNews');
////	Route::post('/administration/news/delete', 'AdminController@destroyNews');
//});